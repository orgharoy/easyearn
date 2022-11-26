<?php

session_start();

if (isset($_POST["create-button"])) {

    require 'db_conn.php';
    require 'functions.php';

    $userId = $_SESSION["userid"];

    $title = trim($_POST['jobtitle']);
    $desc = $_POST['jobdesc'];
    $address = $_POST['jobadd'];
    $area = $_POST['area'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $salary = $_POST['salary'];


    $image1 = $_FILES['job-image1']['name'];
    $imageError1 = $_FILES['job-image1']['error'];
    $imageTempName1 = $_FILES['job-image1']['tmp_name'];
    $imageExtention1 = strtolower(pathinfo($image1, PATHINFO_EXTENSION));

    $image2 = $_FILES['job-image2']['name'];
    $imageError2 = $_FILES['job-image2']['error'];
    $imageTempName2 = $_FILES['job-image2']['tmp_name'];
    $imageExtention2 = strtolower(pathinfo($image2, PATHINFO_EXTENSION));



    if (emptyFieldsCreatejob($title, $desc, $address, $area, $date, $time, $salary) !== false) {
        header("Location: ../createjob.php?error=emptyfield");
        exit();
    }

    if (lowSalary($salary) !== false) {
        header("Location: ../createjob.php?error=lowSalary");
        exit();
    }

    if (errorImage($image1, $imageError1) !== false || errorImage($image2, $imageError2) !== false) {
        header("Location: ../createjob.php?error=imageError");
        exit();
    }

    $new_imageName1 = uniqid("Job-", true) . '.' . $imageExtention1;
    $imageUploadPath1 = '../images/job-images/' . $new_imageName1;
    move_uploaded_file($imageTempName1, $imageUploadPath1);

    $new_imageName2 = uniqid("Job-", true) . '.' . $imageExtention2;
    $imageUploadPath2 = '../images/job-images/' . $new_imageName2;
    move_uploaded_file($imageTempName2, $imageUploadPath2);

    createJob($conn, $userId, $title, $desc, $address, $area, $date, $time, $salary, $new_imageName1, $new_imageName2);
} else {
    header("Location: ../index.php?error=error");
    exit();
}
