<?php

function sanitization($input)
{
    return trim(htmlentities(htmlspecialchars($input)));
}


function require_input($input)
{
    if (empty($input)) {
        return true;
    }
    return false;
}

function min_length($input, $min)
{
    if (strlen($input) < $min) {
        return true;
    }
    return false;
}
function max_length($input, $max)
{
    if (strlen($input) > $max) {
        return true;
    }
    return false;
}



function get_data($path)
{
    $file = file_get_contents($path);
    $file = json_decode($file, true);
    return $file;
}

function user_check($users, $email, $password)
{

    foreach ($users as $user) {
        if ($user['email'] == $email && $user["password"] == $password) {
            $login_details = [
                "name" => $user['name'],
                "email" => $user['email']
            ];
            return $login_details;
        }
    }
    return false;

}

function login_check() {
    if (empty($_SESSION["user_details"])) {
        return true; 
    } else {
        return false; 
    }
}

function get_total_price(){
    $data = get_data("data/cart.json");
    $sum = 0;
    foreach($data as $val){
        $sum += $val["price"] * $val["count"];
    }
    return $sum;
}