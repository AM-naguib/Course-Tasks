<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-dark-subtle">
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;" data-bs-theme="light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03"
                aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor03">
                <?php if (isset($_SESSION['user_details'])): ?>
                    <div class="all-links w-100 bg-light p-5">
                        <div class="login-user d-flex justify-content-between ">
                            <div class="user-shop">
                                <a class="btn btn-primary" href="cart.php">Cart</a>
                                <a class="btn btn-primary" href="products.php">products</a>
                            </div>
                            <div class="user-logout">
                                <a class="btn btn-danger" href="logout.php">logout</a>
                            </div>
                        </div>


                    <?php else: ?>
                        <div class="login-reg gap-2 ms-auto d-flex gap-4">
                            <a class="btn btn-primary" href="login.php">Login</a>
                            <a class="btn btn-primary" href="signup.php">Sign up</a>
                        </div>
                    <?php endif ?>
                </div>



            </div>
        </div>
    </nav>