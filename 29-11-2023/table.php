<?php
session_start();
require_once("./inc/header.php");
if(!isset($_SESSION["product"])){
    header("location:index.php");
}
?>
<div class="container">
    <h1 class="text-center my-3">Product Details</h1>
    <div class="row">
        <div class="col-8 mx-auto">
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr class="text-center">
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        <th>Product Discount</th>
                        <th>Product Img Url</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <?php foreach ($_SESSION["product"] as $key => $value): ?>
                            <td>
                                <?php 
                                
                                if($key != "img"){
                                    echo $value;
                                }else{
                                    echo "<a href='".$_SESSION["product"]['img']."'>click to see img</a>";
                                }
                                ?>
                            </td>
                        <?php endforeach ?>
                    </tr>
                    <tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
unset($_SESSION["product"]);
require_once("./inc/footer.php");
?>