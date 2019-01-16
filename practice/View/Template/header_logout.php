<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/View/Image/header/tab_icon.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/View/CSS/header_cart.css">
    <link rel="stylesheet" href="/View/CSS/MoveArrowTop.css">
    <script type="text/javascript" src="//web-ptica.ru/VRV-files/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="/View/JS/MoveArrowTop.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/js/bootstrap-formhelpers.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
</head>
<body>
<a href="#" class="scrollup">Наверх</a>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark pb-0">
    <div class="container">
        <a href="http://practice/main/show_main"><img src="/View/Image/header/logo_head.png" alt="logo_head"></a>
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
                    <a href="http://practice/login/Logout" class="nav-link mr-1" data-target="#exampleModalCenter"><img class="mb-2" src="/View/Image/header/Login.png"> выйти</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid cart">
    <div class="container">
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3 text-right">
                <a href="http://practice/cart/show_product_cart">
                    <button type="button" class="btn btn-dark mb-1 p-1">
                        <img src="/View/Image/header/Cart.png" alt="Image cart">
                        <span class="amount rounded-circle pl-2 pr-2" style="background: red" id="amount_products_in_cart"><?php echo count($_SESSION['product_id']) ?></span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
