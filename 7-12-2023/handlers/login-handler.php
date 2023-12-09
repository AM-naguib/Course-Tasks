<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../core/functions.php";
    foreach ($_POST as $key => $value) {
        $$key = sanitization($value);
    }

    $users_data = get_data("../data/users.json");
    
    $login_details = user_check($users_data, $email, $password);

    if ($login_details) {
        $_SESSION['user_details'] = $login_details;
        unset($_SESSION["user-data"]);
        header("location: ../products.php");
    } else {
        $_SESSION["erorrs"] = "your email or password is wrong";
        header("location: ../login.php");

    }

} else {
    echo "erorr";
}