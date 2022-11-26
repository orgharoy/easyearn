<?php

if (isset($_POST['signup'])) {

    require 'db_conn.php';
    require 'functions.php';

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['emailaddress']);
    $phonenumber = trim($_POST['phonenumber']);
    $dateofbirth = $_POST['dob'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];

    if (emptyFieldsSignup($firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $password, $passwordRepeat) !== false) {
        header("Location: ../signup.php?error=emptyfield");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location: ../signup.php?error=invalidEmail");
        exit();
    }
    if (invalidNumber($phonenumber) !== false) {
        header("Location: ../signup.php?error=invalidNumber");
        exit();
    }
    if (passwordLength($password) !== false) {
        header("Location: ../signup.php?error=shortPassword");
        exit();
    }
    if (passwordMatch($password, $passwordRepeat) !== false) {
        header("Location: ../signup.php?error=missmatchPassword");
        exit();
    }
    if (userExists($conn, $email) !== false) {
        header("Location: ../signup.php?error=userExists");
        exit();
    }

    createUser($conn, $firstname, $lastname, $email, $phonenumber, $dateofbirth, $gender, $password);
} else {
    header("Location: ../signup.php?error=signup");
    exit();
}
