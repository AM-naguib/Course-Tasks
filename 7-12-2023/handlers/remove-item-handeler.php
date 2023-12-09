<?php

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once('../core/functions.php');
    $id = $_GET["id"];

    $all_cart = get_data("../data/cart.json");
    $found = false;
    foreach($all_cart as $index => $item){
        if($item["id"] == $id){
            $found = true;
            unset($all_cart[$index]);
            break;
        }
    }
    if($found){
        file_put_contents("../data/cart.json", json_encode($all_cart));
        $_SESSION["success"] = "Product deleted to cart successfully";

    }else{
        $_SESSION["error"] = "Product not found in cart";
        
    }
    header("location:../cart.php");
}