<?php

session_start();
require_once("./inc/header.php");
require_once("./core/functions.php");

required_login();


$url_users = "https://jsonplaceholder.typicode.com/users";
$users = req_data($url_users);

?>

<div class="container">
    <h1 class="text-center">All Users</h1>
    <div class="row">
        <div class="col-7 mx-auto border rounded">
            <h1 class="text-center border-bottom p-2 text-success">Real Registered Users</h1>
            <div class="real-users d-flex gap-3 flex-wrap border-bottom ">
                <?php foreach ($_SESSION['users_data'] as $key => $value): ?>
                    <div class="col my-3 border p-1 text-center">
                        <p class="mb-1">ID : <?=  $key +1 ?></p>
                        <p class="mb-1">Name : <?=  $value['name'] ?></p>
                        <p class="mb-1">Email : <?= $value['email'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-7 mx-auto border rounded mt-1">
            <h1 class="text-center border-bottom p-2 text-danger">Fake Users</h1>
            <div class="fake-users d-flex gap-3 flex-wrap border-bottom ">
                <?php foreach ($users as $value): ?>
                <div class="col my-3 border p-2 text-center">
                    <div class="user-info ">
                        <p class="mb-1">ID : <?= $value['id'] ?></p>
                        <p class="mb-1">Name : <?= $value['name'] ?></p>
                        <p class="mb-3">Email : <?= $value['email'] ?></p>
                    </div>
                    <div class="user-actions d-flex justify-content-center gap-4">
                        <div class="posts">
                            <a href="<?php echo "posts.php?userId=" . $value['id'] ?>" class="btn btn-primary">Posts</a>
                        </div>
                        <div class="todos">
                            <a href="<?php echo "todos.php?userId=" . $value['id'] ?>" class="btn btn-primary">Todos</a>
                        </div>
                        <div class="profile">
                            <a href="<?php echo "profile.php?userId=" . $value['id'] ?>" class="btn btn-primary">Profile</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
</div>


<?php require_once("./inc/footer.php") ?>