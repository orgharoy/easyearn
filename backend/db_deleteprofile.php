<?php

session_start();

if (isset($_POST['delete-button'])) {

    require 'db_conn.php';

    $userId = $_SESSION["userid"];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE user_id = " . $userId . ";";

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) < 1) {
        header("Location: ../editprofile.php?error=noUser");
        exit();
    }

    $row = mysqli_fetch_assoc($query);

    $verifyPass = password_verify($password, $row['pwd']);

    if ($verifyPass === false) {
        header("Location: ../editprofile.php?error=incorrectPassword");
        exit();
    } else {
        $q = "DELETE FROM users WHERE user_id = " . $userId . ";";
        $execution = mysqli_query($conn, $q);

        header("Location: db_logout.php");
    }
} else {
    header("Location: ../editprofile.php?error=whydelete?");
    exit();
}
