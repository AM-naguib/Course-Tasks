<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $erorrs = [];

    require_once "../core/functions.php";
    foreach ($_POST as $key => $value) {
        $$key = sanitization($value);
    }

    if (require_input($name)) {
        $erorrs[] = "your name is empty";
    } elseif (min_length($name, 3)) {
        $erorrs[] = "your name is too short";
    } elseif (max_length($name, 40)) {
        $erorrs[] = "your name is too long";
    }

    if (require_input($email)) {
        $erorrs[] = "your email is empty";
    } elseif (min_length($email, 3)) {
        $erorrs[] = "your email is too short";
    } elseif (max_length($email, 40)) {
        $erorrs[] = "your email is too long";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erorrs[] = "your email is not valid";
    }


    if (require_input($password)) {
        $erorrs[] = "your password is empty";
    } elseif (min_length($password, 8)) {
        $erorrs[] = "your password is too short";
    } elseif (max_length($password, 40)) {
        $erorrs[] = "your password is too long";
    }

    $_SESSION["user-data"] = [
        "name" => $name,
        "email" => $email,
        "password" => $password
    ];

    $user_file = get_data("../data/users.json");
    if (isset($user_file)) {
        foreach ($user_file as $value) {
            if ($value["email"] == $email) {
                $erorrs[] = "this email is already exist";
                break;
            }
        }
    }

    if (empty($erorrs)) {
        $data = $user_file;
        $data[] = $_SESSION["user-data"];
        file_put_contents("../data/users.json", json_encode($data));
        $_SESSION["success"] = "your account created successfully, you can login now";
        header("location: ../login.php");
    } else {
        $_SESSION["errors"] = $erorrs;
        header("location: ../signup.php");
        die();
    }

}