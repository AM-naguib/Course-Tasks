<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require_once('../core/functions.php');

    if (isset($_GET['id'])) {
        $products = get_data("../data/products.json")['products'];
        $cart = get_data("../data/cart.json");
        $product_id = $_GET['id'];
        $found_product = false;

        foreach ($products as $product) {
            if ($product["id"] == $product_id) {
                if (isset($cart)) {
                    foreach ($cart as $key => $value) {
                        if ($value['id'] == $product_id) {
                            $found_product = true;
                            $existing_product_key = $key;
                            break;
                        }
                    }
                }

                if ($found_product) {
                    $cart[$existing_product_key]["count"] += 1;
                } else {
                    $product["count"] = 1;
                    $cart[] = $product;
                }
            }
        }
        file_put_contents("../data/cart.json", json_encode($cart));
        $_SESSION["success"] = "Product added to cart successfully";
        header("location:../products.php");
    }
}