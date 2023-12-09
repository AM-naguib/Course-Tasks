<?php
session_start();
require_once 'inc/header.php';
require_once 'core/functions.php';
if(!login_check()) {
    header("location:products.php");
}
?>

<div class="container">
    <h1 class="text-center my-4 display-1 border-bottom  p-3">Login</h1>
    <div class="row">
        <form action="./handlers/login-handler.php" method="post">
            <div class="col-lg-5 col-12 mx-auto my-5 p-5 border rounded shadow bg-light ">
                <?php if (isset($_SESSION["success"])): ?>
                    <div class="alert alert-success">
                        <?= $_SESSION["success"] ?>
                    </div>
                    <?php
                    unset($_SESSION["success"]);
                endif ?>
                <?php if (isset($_SESSION["erorrs"])): ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION["erorrs"] ?>
                    </div>
                    <?php
                    unset($_SESSION["erorrs"]);
                endif ?>
                <div class="mb-4">
                    <label for="email" class="form-label">Email : </label>

                    <input type="email" class="form-control border mx-auto " id="email" name="email"
                        placeholder="Enter Email" value="<?php if (isset($_SESSION["user-data"]["email"]))
                            echo $_SESSION["user-data"]["email"]; ?>">

                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>

                    <input type="password" class="form-control border mx-auto " id="password" name="password"
                        placeholder="Enter Password" value="<?php if (isset($_SESSION["user-data"]["password"]))
                            echo $_SESSION["user-data"]["password"]; ?>">

                </div>
                <div class="mb-4 text-center">
                    <button type="submit" class="btn btn-primary w-25 fs-5">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once 'inc/footer.php'; ?>