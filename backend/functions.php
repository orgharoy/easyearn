<?php

//Signup Functions

function emptyFieldsSignup($firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $password, $passwordRepeat)
{
    $result;
    if (empty($firstname) || empty($lastname) || empty($email) || empty($phonenumber) || empty($dateofbirth) || empty($gender) || empty($password) || empty($passwordRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidNumber($phonenumber)
{
    $result;
    if (!((preg_match("/\+/", $phonenumber) && preg_match("/^\+\d{13}$/", $phonenumber)) || (!preg_match("/\+/", $phonenumber) && preg_match("/^\d{11}$/", $phonenumber)))) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordLength($password)
{
    $result;
    if (strlen($password) < 8) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $passwordRepeat)
{
    $result;
    if ($password !== $passwordRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function userExists($conn, $email)
{
    $sql = "SELECT * from users WHERE email_address = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: signup.php?error=sqlerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultsData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// Create User

function createUser($conn, $firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $password)
{
    $sql = "INSERT INTO users (first_name, last_name, email_address, phone_num, date_of_birth, gender, pwd) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlentryerror");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $hashedPassword);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("Location: ../login.php?error=success");
    exit();
}

//Login functions
//Login functions
//Login functions
//Login functions
//Login functions

function emptyFieldsLogin($email, $password)
{
    $result;
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $password)
{
    $userExists = userExists($conn, $email);

    if ($userExists === false) {
        header("Location: ../login.php?error=noUser");
        exit();
    }

    $pwdHashed = $userExists["pwd"];
    $checkPassword = password_verify($password, $pwdHashed);

    if ($checkPassword === false) {
        header("Location: ../login.php?error=incorrectLogin");
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] = $userExists["user_id"];
        $_SESSION["userName"] = $userExists["first_name"];
        $_SESSION["email_address"] = $userExists["email_address"];

        header("Location: ../index.php");
        exit();
    }
}


//update user
//update user
//update user
//update user
//update user

function errorImage($image, $imageError)
{
    $result;

    $extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') {
        if ($imageError == 0) {
            $result = false;
        } else {
            $result = true;
        }
    } else {
        $result = true;
    }

    return $result;
}


function updateUser($conn, $firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $about, $password)
{

    $id = $_SESSION["userid"];

    $q = "SELECT * from users WHERE user_id=" . $id . ";";
    $find = mysqli_query($conn, $q);
    if (mysqli_num_rows($find) < 1) {
        header("Location: ../editprofile.php?error=noUser");
        exit();
    }
    $userExists = mysqli_fetch_assoc($find);

    $pwdHashed = $userExists["pwd"];
    $checkPassword = password_verify($password, $pwdHashed);

    if ($checkPassword === false) {
        header("Location: ../editprofile.php?error=incorrectPassword");
        exit();
    } else if ($checkPassword === true) {
        $id = $_SESSION["userid"];
        $sql = "UPDATE users SET first_name = ?, last_name = ?, email_address = ?, phone_num = ?, date_of_birth = ?, gender = ?, about_me = ? WHERE user_id = $id;";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../editprofile.php?error=sqlentryerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $about);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        header("Location: ../profile.php?id=$id");
        exit();
    }
}

function updateUserPwd($conn, $firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $about, $newpassword, $password)
{
    $id = $_SESSION["userid"];

    $q = "SELECT * from users WHERE user_id=" . $id . ";";
    $find = mysqli_query($conn, $q);
    if (mysqli_num_rows($find) < 1) {
        header("Location: ../editprofile.php?error=noUser");
        exit();
    }
    $userExists = mysqli_fetch_assoc($find);


    $pwdHashed = $userExists["pwd"];
    $checkPassword = password_verify($password, $pwdHashed);

    if ($checkPassword === false) {
        header("Location: ../editprofile.php?error=incorrectPassword");
        exit();
    } else if ($checkPassword === true) {

        $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET first_name = ?, last_name = ?, email_address = ?, phone_num = ?, date_of_birth = ?, gender = ?, pwd = ?, about_me = ? WHERE user_id = $id;";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../editprofile.php?error=sqlentryerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssssss", $firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $hashedPassword, $about);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        header("Location: db_logout.php");
        exit();
    }
}


//create job
//create job
//create job
//create job
//create job
//create job
//create job

function emptyFieldsCreatejob($title, $desc, $address, $area, $date, $time, $salary)
{
    $result;
    if (empty($title) || empty($desc) || empty($address) || empty($area) || empty($date) || empty($time) || empty($salary)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function lowSalary($salary)
{
    $result;
    if ($salary < 100) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createJob($conn, $userId, $title, $desc, $address, $area, $date, $time, $salary, $new_imageName1, $new_imageName2)
{
    $sql = "INSERT INTO jobs (user_id, title, description, address, area, date, time, salary, image1, image2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../createjob.php?error=sqlentryerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "isssssssss", $userId, $title, $desc, $address, $area, $date, $time, $salary, $new_imageName1, $new_imageName2);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("Location: ../index.php?error=none");
    exit();
}


//update job
//update job
//update job
//update job


function updateJob($conn, $jobid, $title, $desc, $address, $area, $date, $time, $salary, $status)
{
    $sql = "SELECT * FROM jobs WHERE job_id = " . $jobid . ";";
    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) < 1) {
        header("Location: index.php?error=queryerrorUJ");
        exit();
    }

    $q = "UPDATE jobs SET title = ?, description = ?, address = ?, area = ?, date = ?, time = ?, salary = ?, status = ? WHERE job_id =" . $jobid . ";";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $q)) {
        header("Location: index.php?error=queryerrorUJ");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $title, $desc, $address, $area, $date, $time, $salary, $status);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("Location: ../job.php?job=" . $jobid . "&error=none");
    exit();
}
