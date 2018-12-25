<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/View/CSS/MoveArrowTop.css">
    <script type="text/javascript" src="//web-ptica.ru/VRV-files/jquery-2.1.3.min.js "></script>
    <script type="text/javascript" src="/View/JS/MoveArrowTop.js"></script>
</head>
<body>
    <a href="#" class="scrollup">Наверх</a>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <img src="/View/Image/sdf.png" alt="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link">Welcome, </a>
                    </li>
                    <?php
                    if($_SESSION['id'] == 1) {
                        ?>
                        <li class="nav-item">
                            <a href="" class="nav-link"><img src="https://raw.githubusercontent.com/iconic/open-iconic/master/png/account-login-2x.png"> выйти</a>
                            <button type="button" class="btn btn-dark ml-5 pl-3"><img src="/View/Image/header/Cart.png"></button>
                        </li>
                        <?php
                    }
                    else
                    {
                        ?>
                        <li class="nav-item">
                            <a href="" class="nav-link"><img class="mb-1" src="/View/Image/header/Login.png"> регистрация</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>