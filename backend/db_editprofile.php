<?php

session_start();

if (isset($_POST["edit-profile"])) {

    $id = $_SESSION["userid"];

    require "db_conn.php";
    require "functions.php";

    $firstname = trim($_POST['firstName']);
    $lastname = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phonenumber = trim($_POST['phoneNumber']);
    $dateofbirth = $_POST['dob'];
    $gender = $_POST['gender'];
    $about = $_POST['about'];
    $newpassword = $_POST['newpwd'];
    $password = $_POST['pwd'];


    if (emptyFieldsSignup($firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $password, $password) !== false) {
        header("Location: ../editprofile.php?error=emptyfield");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location: ../editprofile.php?error=invalidEmail");
        exit();
    }
    if (invalidNumber($phonenumber) !== false) {
        header("Location: ../editprofile.php?error=invalidNumber");
        exit();
    }

    if (!$newpassword) {

        if ($_FILES['profile-image']['error'] == 0) {
            $image = $_FILES['profile-image']['name'];
            $imageError = $_FILES['profile-image']['error'];
            $imageTempName = $_FILES['profile-image']['tmp_name'];

            if (errorImage($image, $imageError) !== false) {
                header("Location: ../editprofile.php?error=imageError");
                exit();
            }

            $imageExtention = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            $new_imageName = uniqid("Profile-", true) . '.' . $imageExtention;
            $imageUploadPath = '../images/profile-images/' . $new_imageName;
            move_uploaded_file($imageTempName, $imageUploadPath);

            $sql = "UPDATE users SET image = ? WHERE user_id = " . $id . ";";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../editprofile.php?error=sqlentryerror");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $new_imageName);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
        }

        updateUser($conn, $firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $about, $password);
    }
    if ($newpassword) {
        if (passwordLength($newpassword) !== false) {
            header("Location: ../editprofile.php?error=shortPassword");
            exit();
        }

        if ($_FILES['profile-image']['error'] == 0) {
            $image = $_FILES['profile-image']['name'];
            $imageError = $_FILES['profile-image']['error'];
            $imageTempName = $_FILES['profile-image']['tmp_name'];

            if (errorImage($image, $imageError) !== false) {
                header("Location: ../editprofile.php?error=imageError");
                exit();
            }

            $imageExtention = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            $new_imageName = uniqid("Profile-", true) . '.' . $imageExtention;
            $imageUploadPath = '../images/profile-images/' . $new_imageName;
            move_uploaded_file($imageTempName, $imageUploadPath);

            $sql = "UPDATE users SET image = ? WHERE user_id = " . $id . ";";

            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../editprofile.php?error=sqlentryerror");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $new_imageName);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
        }


        updateUserPwd($conn, $firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $about, $newpassword, $password);
    }
} else {
    header("Location: ../profile.php?id=$id");
    exit();
}
