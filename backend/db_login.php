<?php

if (isset($_POST['login-button'])) {

    require 'db_conn.php';
    require 'functions.php';

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (emptyFieldsLogin($email, $password) !== false) {
        header("Location: ../login.php?error=emptyField");
        exit();
    }

    loginUser($conn, $email, $password);
} else {
    header("Location: ../login.php?error=login");
    exit();
}
