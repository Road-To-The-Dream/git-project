<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/View/CSS/cart.css">
    <link rel="stylesheet" href="/View/CSS/MoveArrowTop.css">
    <script type="text/javascript" src="//web-ptica.ru/VRV-files/jquery-2.1.3.min.js "></script>
    <script type="text/javascript" src="/View/JS/MoveArrowTop.js"></script>
</head>
<body>
    <a href="#" class="scrollup">Наверх</a>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a href="" class="navbar-brand">
                <img src="/View/Image/sdf.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="http://practice/cart/show_product_cart">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://practice/catalog/show_all">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://practice/login/show_login">Log in</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" value=<?php echo $_SESSION['isAuth']; ?>>
                    <button type="button" class="btn btn-warning">Search</button>
                </form>
            </div>
        </div>
    </nav>
</body>
</html>