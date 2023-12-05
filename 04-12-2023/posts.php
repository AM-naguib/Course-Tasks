<?php
require_once("./core/functions.php");
session_start();
require_once("./inc/header.php");

required_login();


if (isset($_GET["userId"])) {
    $url_posts = "https://jsonplaceholder.typicode.com/posts?userId=" . $_GET["userId"];
} else {
    $url_posts = "https://jsonplaceholder.typicode.com/posts";
}


$all_names = getUserName();

$posts = req_data($url_posts);


$url_comments = "https://jsonplaceholder.typicode.com/comments";

$comments = req_data($url_comments);
?>
<div class="container">
    <div class="welcome p-4 border border-3 rounded mx-auto w-50 mt-3">
        <h2 class="text-center">Hello
            <?= $_SESSION["login_data"]["name"] ?>
        </h2>
    </div>
    <h1 class="text-center">Posts</h1>
    <div class="row">
        <div class="col-8 mx-auto border rounded">
            <?php foreach ($posts as $post): ?>
                <div class="post p-2 my-4 border border-3 rounded">
                    <div class="post-head d-flex align-items-center border-bottom border-0 pb-1">
                        <div class="user-info p-2 border-end mx-2 w-25">
                            <p class="m-0">
                                <a href="profile.php?userId=<?= $post["userId"] ?>">
                                    <?= getName($post["userId"], $all_names) ?>
                                </a>
                            </p>
                            <p class="m-0">
                                <?= "PostId:" . $post["id"] ?>
                            </p>
                        </div>
                        <div class="post-title">
                            <h2 class="fs-4">
                                <?= $post["title"] ?>
                            </h2>
                        </div>
                    </div>
                    <div class="post-body mt-3 border-3 border-bottom">
                        <p>
                            <?= $post["body"] ?>
                        </p>
                    </div>
                    <div class="comments mt-3">
                        <h5 class="border-bottom p-2">Comments</h5>
                        <?php foreach ($comments as $comment):
                            if ($comment['postId'] == $post["id"]): ?>

                                <div class="comment-info ms-4 d-flex text-wrap align-items-center border-bottom mt-2">
                                    <div class="user-info border-end p-1 w-50">

                                        <div class="user-email w-100">
                                            <p class="m-0 fs- text-justify">
                                                <?= $comment['email'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="comment-body ms-2 w-75">
                                        <p>
                                            <?= $comment['body'] ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                            endif;
                        endforeach ?>

                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</div>
<?php require_once("./inc/footer.php") ?>