<?php
session_start();
require_once "./inc/header.php";
require_once 'core/functions.php';
if(login_check()) {
    header("location:login.php");
    die;
}
$cart = get_data("data/cart.json");

?>

<body>
    <div class="container">
        <h1 class="text-center my-4 display-1 border-bottom p-3">Cart</h1>
        <div class="row">
            <?php if (!empty($cart)): ?>
                <?php foreach ($cart as $item): ?>
                    <div class="col-12">
                        <div
                            class="item border p-3 mt-3 d-flex  align-items-center justify-content-between bg-white rounded">
                            <div class="item-left d-flex">
                                <div class="item-img">
                                    <img width="200" height="200" class="rounded " src="<?= $item['images'][0] ?>" alt="">
                                </div>
                                <div class="item-detials ms-3">
                                    <h2><?= $item['title'] ?></h2>
                                    <p>Count : <?= $item['count'] ?></p>
                                    <p>Price : <?= $item['price'] ?> USD</p>
                                </div>
                            </div>
                            <div class="item-remove">
                                <a href="handlers/remove-item-handeler.php?id=<?= $item['id'] ?>" class="btn btn-danger">Remove</a>
                            </div>

                        </div>
                    </div>
                    <?php endforeach ?>
                    <h1 class="text-center my-4 display-2 p-3">Total : <?php echo get_total_price() ?> USD</h1>
            <?php else: ?>
                <h1 class="text-center mt-5 display-1 p-3 text-danger">Cart is empty</h1>
            <?php endif ?>

        </div>
    </div>

    <?php require_once "./inc/footer.php"; ?>