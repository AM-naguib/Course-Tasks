<?php
session_start();
require_once "./core/functions.php";

$sum = 0;
foreach(total_cart("data/cart.json") as $val){
    $sum += $val["price"];
}
echo $sum;
echo "<pre>";
var_dump(empty($_SESSION["user_details"])); 
print_r($_SESSION);