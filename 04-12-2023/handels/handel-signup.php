<?php
require_once("../core/functions.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $erorrs = [];
    foreach ($_POST as $key => $value) {

        $$key = sanitizer($value);
    }

    if (required($name)) {
        $erorrs[] = "Name is empty";
    } elseif (min_len($name, $len = 3)) {
        $erorrs[] = "Name Must be greater than $len Char";
    } elseif (max_len($name, $len = 20)) {
        $erorrs[] = "Name Must be less than $len Char";
    }

    if (required($email)) {
        $erorrs[] = "email is empty";
    } elseif (min_len($email, $len = 3)) {
        $erorrs[] = "email Must be greater than $len Char";
    } elseif (max_len($email, $len = 50)) {
        $erorrs[] = "email Must be less than $len Char";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erorrs[] = "enter valid email yad";

    }

    if (required($password)) {
        $erorrs[] = "password is empty";
    } elseif (min_len($password, $len = 3)) {
        $erorrs[] = "password Must be greater than $len Char";
    } elseif (max_len($password, $len = 30)) {
        $erorrs[] = "password Must be less than $len Char";
    }

    if (empty($erorrs)) {
        $_SESSION['users_data'][] = [
            "name" => $name,
            "email" => $email,
            "password" => $password
        ];
        $_SESSION['success'] = "Success Registered, You will be automatically directed to the login page after 5s";

    } else {
        $_SESSION['erorrs'] = $erorrs;
        header("location:../signup.php");
        die;
    }
    header("location:../signup.php");

} else {
    echo "cannot access this page";
    die;
}