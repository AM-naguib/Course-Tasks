<?php
session_start();
require_once("./inc/header.php");
require_once("./core/functions.php");

required_login();

if (!isset($_GET["userId"])) {
    header("location:allusers.php");
    die;
}
$url_user = "https://jsonplaceholder.typicode.com/users/" . $_GET["userId"];
$user = req_data($url_user);

?>
<div class="container">
    <h1 class="text-center display-1 mt-5 border-bottom pb-3">Profile</h1>
    <div class="row">
        <div class="col-6 offset-3 mt-5 border rounded p-5 bg-light shadow p-3 mb-5 bg-body rounded">
            <div class="user-info">
                <p class="fw-bold fs-5">ID :
                    <?php echo $user["id"]; ?>
                </p>
                <p class="fw-bold fs-5">Name :
                    <?php echo $user["name"]; ?>
                </p>
                <p class="fw-bold fs-5">Username :
                    <?php echo $user["username"]; ?>
                </p>
                <p class="fw-bold fs-5">Email :
                    <?php echo $user["email"]; ?>
                </p>
                <p class="fw-bold fs-5">Address :
                    <?php echo $user["address"]["street"] . " " . $user["address"]["suite"]; ?>
                </p>
                <p class="fw-bold fs-5">City :
                    <?php echo $user["address"]["city"] ?>
                </p>
                <p class="fw-bold fs-5">Zipcode :
                    <?php echo $user["address"]["zipcode"] ?>
                </p>
                <p class="fw-bold fs-5">Phone :
                    <?php echo $user["phone"]; ?>
                </p>
                <p class="fw-bold fs-5">Website : <a href="<?php echo $user["website"]; ?>">
                        <?php echo $user["website"]; ?>
                    </a></p>
                <p class="fw-bold fs-5">Company :
                    <?php echo $user["company"]["name"]; ?>
                </p>
                <div class="user-actions d-flex justify-content-center gap-4">
                    <div class="posts">
                        <a href="<?php echo "posts.php?userId=" . $_GET["userId"] ?>" class="btn btn-primary">Posts</a>
                    </div>
                    <div class="todos">
                        <a href="<?php echo "todos.php?userId=" . $_GET["userId"] ?>" class="btn btn-primary">Todos</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>