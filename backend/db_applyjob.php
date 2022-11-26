<?php

session_start();

include_once 'db_conn.php';

$jobId = $_GET['jobId'];
$userId = $_SESSION['userid'];

echo $jobId;
echo $userId;

$sql = "INSERT INTO applied (job_id, user_id) VALUES (" . $jobId . " , " . $userId . ") ;";
$query = mysqli_query($conn, $sql);

header("Location: ../job.php?job=" . $jobId);

exit();
