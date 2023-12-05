<?php
require_once("../core/functions.php");
session_start();
$erorrs = [];
$status = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){


    foreach($_POST as $key => $val){
        $$key = sanitizer($val);
    }

    foreach($_SESSION['users_data'] as $value){
        if($value['email'] === $email && $value["password"] === $password){
            $status = true;
            $name = $value["name"];
            break;
        }
    }
    if($status){
        $_SESSION["login_data"] = [
            "email" => $email,
            "name" => $name
        ];
        header("location:../posts.php");
    }else{
        $_SESSION["erorrs"] = "email or password invalid";
        header("location:../login.php");
    }
}else{
    echo "cannot access this page";
    // die;
}
