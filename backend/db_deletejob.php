<?php

session_start();

if (isset($_POST['delete-job-button'])) {

    require 'db_conn.php';

    $jobid = $_GET['jobid'];


    //

    $sql = "DELETE FROM jobs WHERE job_id = " . $jobid . ";";

    $query = mysqli_query($conn, $sql);

    header("Location: ../index.php");

    //

} else {
    header("Location: ../editprofile.php?error=whydelete?");
    exit();
}
