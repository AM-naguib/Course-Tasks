
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <?php if (isset($_SESSION["login_data"])): ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0  ">
                    <li class="nav-item me-auto ">
                        <a class="nav-link active" href="posts.php">Posts</a>
                    </li>
                    <a class="nav-link active" href="todos.php">Todos</a>
                    <a href="allusers.php" class="nav-link active">All Users</a>
                </ul>
                <a class="nav-link active" href="logout.php">Logout</a>
            <?php else: ?>
                <div class="not-login d-flex">
                <a class="nav-link me-4" href="login.php">Login</a>
                <a class="nav-link " href="signup.php">Sign Up</a>
                </div>
            <?php endif ?>

        </div>
    </nav>