<?php
require_once("./inc/header.php");
session_start();

if (isset($_SESSION["login_data"])) {
    header("location:posts.php");
    die;
}
?>

<div class="container">
    <div class="row">
        <h1 class="text-center mt-3">Login</h1>
        <div class="col-5 mx-auto my-4 p-3 border rounded">
            <!-- Error Show Start -->
            <?php if (isset($_SESSION['erorrs'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['erorrs'] ?>
                </div>
                <?php unset($_SESSION['erorrs']) ?>
            <?php endif ?>
            <!-- Error Show End -->
            <form action="./handels/handel-login.php" method="POST">
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="mb-3 text-center">
                    <input class="btn btn-primary" type="submit">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once("./inc/footer.php") ?>