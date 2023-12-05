<?php
session_start();
require_once("./inc/header.php");
if(isset($_SESSION["login_data"])){
    header("location:posts.php");
    die;
}
?>
<div class="container">
    <div class="row">
        <h1 class="text-center mt-3">Sign Up</h1>
        <div class="col-5 mx-auto my-4 p-3 border rounded">
            <!-- Error Show Start -->
            <?php if (isset($_SESSION['erorrs'])): ?>
                <?php foreach ($_SESSION['erorrs'] as $value): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $value ?>
                    </div>
                <?php endforeach ?>
                <?php unset($_SESSION['erorrs']) ?>
            <?php endif ?>
            <!-- Error Show End -->

            <!-- Success Show Start -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['success'] ?>
                </div>
                <?php unset($_SESSION['success']); ?>
                <meta http-equiv="refresh" content="5;url=login.php">
            <?php endif ?>
            <!-- Success Show End -->

            <form action="./handels/handel-signup.php" method="POST">
                <div class="mb-3">
                    <label for="Name">Name</label>
                    <input class="form-control" type="text" name="name" id="Name">
                </div>
                <div class="mb-3">
                    <label for="Name">Email</label>
                    <input class="form-control" type="text" name="email" id="Email">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="mb-3 text-center">
                    <input class="btn btn-primary" type="submit" value="Signup Now">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once("./inc/footer.php") ?>