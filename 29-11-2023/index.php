<?php
session_start();
require_once("./functions.php");
require_once("./inc/header.php");

?>
<div class="container">
    <div class="row">
        <h1 class="mt-5 text-center">Product Information</h1>
        <div class="col-7 mx-auto">
            <?php if (isset($_SESSION["erorrs"])): ?>
                <?php foreach ($_SESSION["erorrs"] as $value): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $value ?>
                    </div>
                <?php endforeach ?>
            <?php endif ?>

            <form action="./handel-form.php" method="POST" enctype="multipart/form-data">

                <label for="" class="">Name:</label>
                <input type="text" class="form-control my-3" placeholder="Enter Product Name" name="pName" value="<?php if (isset($_SESSION["product"]["pName"]))
                    echo $_SESSION["product"]["pName"];
                ?>">

                <label for="" class="">description</label>
                <textarea name="pDesc" id="" class="form-control my-3" placeholder="enter product description"><?php if (isset($_SESSION["product"]["pDesc"]))
                    echo $_SESSION["product"]["pDesc"];
                ?></textarea>

                <label for="" class="">price:</label>
                <input type="text" class="form-control my-3" placeholder="Enter Product price" name="pPrice" value="<?php if (isset($_SESSION["product"]["pPrice"]))
                    echo $_SESSION["product"]["pPrice"];
                ?>">

                <label for="" class="">discount</label>
                <input type="text" class="form-control my-3" placeholder="Enter Product discount (option)"
                    name="pDiscount" value="<?php if (isset($_SESSION["product"]["pDiscount"]))
                        echo $_SESSION["product"]["pDiscount"];
                    ?>">

                <label for="" class="">image</label>
                <input type="file" class="form-control my-3" name="pImg">

                <input type="submit" value="submit" class="btn btn-primary">
                <!-- <button class="btn btn-primary">Submit</button> -->
            </form>
        </div>
    </div>
</div>
<?php
unset($_SESSION["erorrs"]);
require_once("./inc/footer.php");
?>