<?php



function req_data($url){
    $data = file_get_contents($url);
    $decoded_data = json_decode($data,true);
    if($decoded_data){
        return $decoded_data;
    }
    return false;
}

function sanitizer($input){
    return trim(htmlentities(htmlspecialchars($input)));
}
function required($input){
    if(empty($input)){
        return true;
    }
    return false;
}
function min_len($input,$len){
    if(strlen($input) < 3){
        return true;
    }
    return false;
}
function max_len($input,$len){
    if(strlen($input) > $len){
        return true;
    }
    return false;
}

function getUserName(){
    $url = "https://jsonplaceholder.typicode.com/users/";
    $user = req_data($url);
    return $user;
}


function getName($user_id,$data){
    foreach($data as $value){
        if($value["id"] == $user_id){
            return $value["name"];
        }
    }
}


function required_login(){
    if (!isset($_SESSION["login_data"])) {
        $_SESSION["erorrs"] = "please login first :D";
        header("location:login.php");
        die;
    }
}