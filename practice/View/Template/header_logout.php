<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="shortcut icon" href="/View/Image/header/tab_icon.png" type="image/png">
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
        <div class="mt-1">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter"><img class="mb-2" src="/View/Image/header/Phone.png"> Контакты</a>
                </li>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Контактные телефоны</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <p class="text-muted">Консультации и заказ по телефонам</p>
                                    </div>
                                    <div class="row">
                                        <div class="col">(096) 699-83-68</div>
                                        <div class="col">(093) 475-94-79</div>
                                    </div>
                                    <div class="row mt-4 mb-2">
                                        <p class="text-muted">График работы call-центра:</p>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">В будние:</div>
                                        <div class="col">с 8:00 до 21:00</div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">Суббота:</div>
                                        <div class="col">с 9:00 до 20:00</div>
                                    </div>
                                    <div class="row">
                                        <div class="col">Воскресенье:</div>
                                        <div class="col">c 10:00 до 19:00</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <li class="nav-item active">
                    <a class="nav-link">Hello, <?php echo $_SESSION['isAuth'] ?></a>
                </li>
                <li class="nav-item">
                    <a href="http://practice/login/CheckAuth" class="nav-link mr-1" data-target="#exampleModalCenter"><img class="mb-2" src="/View/Image/header/Login.png"> выйти</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</body>
</html>
