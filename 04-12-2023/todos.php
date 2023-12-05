<?php
session_start();
require_once("./inc/header.php");
require_once("./core/functions.php");

required_login();

if(isset($_GET["userId"])){
    $url_todos = "https://jsonplaceholder.typicode.com/todos?userId=".$_GET["userId"];
}else{
    $url_todos = "https://jsonplaceholder.typicode.com/todos";
}

$todos = req_data($url_todos);

$all_names = getUserName();
?>


<div class="container">
    <h1 class="text-center my-3">Todos Page</h1>
    <div class="row">
        <div class="col-8 mx-auto">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>userId</th>
                        <th>id</th>
                        <th>title</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($todos as $value): ?>
                    <tr>
                        <td><a href="profile.php?userId=<?= $value["userId"] ?>"><?=  getName($value["userId"], $all_names) ?></a></td>
                        <td><?= $value["id"] ?></td>
                        <td><?= $value["title"] ?></td>
                        <td class="<?= $value["completed"] ? "bg-success text-light" : ""; ?>"><?= $value["completed"] ? "completed" : "uncomplete"; ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
