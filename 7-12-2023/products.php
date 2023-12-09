<?php
session_start();
require_once "./inc/header.php";
require_once 'core/functions.php';
if(login_check()) {
    header("location:login.php");
    die;
}
$products = get_data("data/products.json")["products"];

?>




<div class="container">
    <h1 class="text-center my-4 display-1 border-bottom p-3">Products</h1>
    <div class="row">
        <div class="col-4 mx-auto">
        <?php if(isset($_SESSION["success"])): ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION["success"] ?>
                </div>
            <?php
            unset($_SESSION["success"]);
            endif ?>
        </div>
        <div class="cards d-flex align-items-center flex-wrap">
            <?php foreach($products as $product): ?>
            <div class="col-4 mb-4">
                <div class="card shadow" style="width: 22rem;">
                    <img width="300" height="300" src="<?= $product['images'][0]  ?>" class="card-img-top" alt="product img">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['title']?></h5>
                        <p class="card-text"><?= $product['description']?></p>
                        <p class="card-text">Price : <?= $product['price']?> USD</p>
                        <a href="handlers/add-to-card-handeler.php?id=<?= $product['id'] ?>" class="btn btn-primary">Add to card</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>


        </div>
    </div>
</div>

<?php require_once "./inc/footer.php"; ?>