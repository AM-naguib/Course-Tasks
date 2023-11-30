<?php
session_start();
require_once("./functions.php");
$erorr = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {


    foreach ($_POST as $key => $value) {
        $_SESSION["product"][$key] = $value;
        $$key = valid_data($value);
    }


    // Start Product Name Validation
    if (empty_input($pName)) {
        $erorr[] = "Name is empty";
    } elseif (min_char($pName, 3)) {
        $erorr[] = "Name is less than 3 char";
    } elseif (max_char($pName, 50)) {
        $erorr[] = "Name is more than 50 char";
    }
    // End Product Name Validation

    // Start Product Desc Validation
    if (empty_input($pDesc)) {
        $erorr[] = "Description is empty";
    } elseif (min_char($pDesc, 3)) {
        $erorr[] = "Description is less than 3 char";
    } elseif (max_char($pDesc, 50)) {
        $erorr[] = "Description is more than 50 char";
    }
    // End Product Desc Validation

    // Start Product Price  Validation
    if (empty_input($pPrice)) {
        $erorr[] = "price is empty";
    } elseif (!filter_var($pPrice, FILTER_VALIDATE_INT)) {
        $erorr[] = "enter valid price";
    }
    // End Product Price Validation


    $pImg = $_FILES['pImg'];
    $allowed = ["png", "jpg", "jpeg", "gif"];

    if ($pImg['name'] == "") {
        $erorr[] = "img is empty";
    }









    if (empty($erorr)) {
        // Start Product img Validation
        $allowed = ["png", "jpg", "jpeg", "gif"];
        if ($pImg['name'] != "") {
            $ext = pathinfo($pImg['name']);
            if (in_array($ext['extension'], $allowed)) {
                if ($pImg['error'] == 0) {
                    if ($pImg['size'] < 1252787) {
                        $new_name = uniqid("", true) . "." . $ext['extension'];
                        $destnotion = "./uploads/" . $new_name;
                        move_uploaded_file($pImg['tmp_name'], $destnotion);
                    } else {
                        $erorr[] = "file is to big";
    
                    }
                } else {
                    $erorr[] = "erorr in upload";
                }
            } else {
                $erorr[] = "this file not allowed";
            }
        } else {
            $erorr[] = "img is empty";
        }
        // End Product img Validation
        $_SESSION["product"]["img"] = "./uploads/$new_name";

        header("location:table.php");
    } else {
        $_SESSION["erorrs"] = $erorr;

        header("location:index.php");
        die;
    }


} else {
    echo "not allowed method";
}