<?php
session_start();
require_once 'inc/header.php';
require_once 'core/functions.php';

if(!login_check()) {
    header("location:products.php");
}
?>
<div class="container">
    <h1 class="text-center my-4 display-1 border-bottom p-3">Sign Up</h1>
    <div class="row">
        <div class="col-lg-5 col-12 mx-auto my-5 p-5 border rounded shadow bg-light text-dark">
            <form action="./handlers/signup-handler.php" method="post">
                <?php if (isset($_SESSION["errors"])): ?>
                    <?php foreach ($_SESSION["errors"] as $error): ?>
                        <div class="alert alert-danger">
                            <?= $error ?>
                        </div>
                    <?php endforeach; ?>
                    <?php
                    unset($_SESSION["errors"]);
                endif; ?>
                <div class="mb-4">
                    <label for="name" class="form-label">Name : </label>
                    <input type="text" class="form-control border mx-auto" name="name" id="name"
                        placeholder="Enter your name"
                        value="<?php if (isset($_SESSION["user-data"]["name"]))
                            echo $_SESSION["user-data"]["name"]; ?>">
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email : </label>
                    <input type="email" class="form-control border mx-auto" name="email" id="email"
                        placeholder="Enter your email"
                        value="<?php if (isset($_SESSION["user-data"]["email"]))
                            echo $_SESSION["user-data"]["email"]; ?>">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control border mx-auto " name="password" id="password"
                        placeholder="Enter your password at least 8 characters " <?php if (isset($_SESSION["user-data"]["password"]))
                            echo $_SESSION["user-data"]["password"]; ?>>
                </div>
                <div class="mb-4 text-center">
                <button type="submit" class="btn btn-primary w-25 fs-5">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once 'inc/footer.php'; ?>