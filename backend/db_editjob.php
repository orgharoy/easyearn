<?php

session_start();


if (isset($_POST["update-job"])) {

    require "db_conn.php";
    require "functions.php";


    $jobid = $_GET['jobid'];
    $title = trim($_POST['jobtitle']);
    $desc = $_POST['jobdesc'];
    $address = $_POST['jobadd'];
    $area = $_POST['area'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $salary = $_POST['salary'];
    $status = $_POST['status'];

    if (emptyFieldsCreatejob($title, $desc, $address, $area, $date, $time, $salary) !== false) {
        header("Location: ../editjob.php?jobid=" . $jobid . "&error=emptyFields");
        exit();
    }

    if (lowSalary($salary) !== false) {
        header("Location: ../editjob.php?jobid=" . $jobid . "&error=lowSalary");
        exit();
    }

    if ($_FILES['job-image1']['error'] == 0) {

        $image1 = $_FILES['job-image1']['name'];
        $imageError1 = $_FILES['job-image1']['error'];
        $imageTempName1 = $_FILES['job-image1']['tmp_name'];

        if (errorImage($image1, $imageError1) !== false) {
            header("Location: ../editprofile.php?jobid=" . $jobid . "&error=imageError");
            exit();
        }

        $imageExtention1 = strtolower(pathinfo($image1, PATHINFO_EXTENSION));

        $new_imageName1 = uniqid("Job-", true) . '.' . $imageExtention1;
        $imageUploadPath1 = '../images/job-images/' . $new_imageName1;
        move_uploaded_file($imageTempName1, $imageUploadPath1);

        $sql = "UPDATE jobs SET image1 = ? WHERE job_id = " . $jobid . ";";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../editprofile.php?jobid=" . $jobid . "&error=sqlentryerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $new_imageName1);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    if ($_FILES['job-image2']['error'] == 0) {

        $image2 = $_FILES['job-image2']['name'];
        $imageError2 = $_FILES['job-image2']['error'];
        $imageTempName2 = $_FILES['job-image2']['tmp_name'];

        if (errorImage($image2, $imageError2) !== false) {
            header("Location: ../editprofile.php?jobid=" . $jobid . "&error=imageError");
            exit();
        }

        $imageExtention2 = strtolower(pathinfo($image2, PATHINFO_EXTENSION));

        $new_imageName2 = uniqid("Job-", true) . '.' . $imageExtention2;
        $imageUploadPath2 = '../images/job-images/' . $new_imageName2;
        move_uploaded_file($imageTempName2, $imageUploadPath2);

        $sql = "UPDATE jobs SET image2 = ? WHERE job_id = " . $jobid . ";";

        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../editprofile.php?jobid=" . $jobid . "&error=sqlentryerror");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $new_imageName2);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    }

    updateJob($conn, $jobid, $title, $desc, $address, $area, $date, $time, $salary, $status);
} else {
    header("Location: ../index.php");
    exit();
}
