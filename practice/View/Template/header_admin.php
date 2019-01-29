<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/View/Image/header/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/View/CSS/cart.css">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark pb-0">
    <div class="container">
        <a href=""><img src="/View/Image/header/logo_head.png" alt="logo_head"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="mt-1">
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link">Hello, <?php echo $_SESSION['isAuth'] ?></a>
                </li>
                <li class="nav-item">
                    <a href="http://practice/main/logout" class="nav-link mr-1" data-target="#exampleModalCenter"><img
                            class="mb-2" src="/View/Image/header/Login.png"> выйти</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>