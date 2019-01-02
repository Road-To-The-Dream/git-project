<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="shortcut icon" href="/View/Image/header/tab_icon.png" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/View/CSS/MoveArrowTop.css">
    <script type="text/javascript" src="//web-ptica.ru/VRV-files/jquery-2.1.3.min.js "></script>
    <script type="text/javascript" src="/View/JS/MoveArrowTop.js"></script>
    <script src="/View/JS/Hundler_login.js"></script>
    <script src="/View/JS/Hundler_register.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div id="blockajax"></div>
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
                        <a href="" class="nav-link mr-1" data-toggle="modal" data-target="#exampleModalCenter1"><img class="mb-2" src="/View/Image/header/Login.png"> войти в аккаунт</a>
                    </li>
                    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" style="background: linear-gradient(#2e3a6a,#2f0b45);">
                                <ul class="nav nav-pills mb-3 mt-4 ml-3" id="pills-tab" role="tablist">
                                    <li class="nav-item mr-3">
                                        <a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sign in</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Registration</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <form method="post" action="" id="formMain1" name="formMain1">
                                            <div class="container mb-3 mt-3">
                                                <div class="row justify-content-center">
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control form-control-lg" name="email_login" placeholder="Email" value="">
                                                            <p class="text-danger ml-2" id="massageEmail1"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control form-control-lg reset" name="password_login" placeholder="Password" value="">
                                                            <p class="text-danger ml-2" id="massagePass1"></p>
                                                        </div>
                                                        <div class="form-group ml-2">
                                                            <p class="text-danger" id="massageAll1"></p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3"></div>
                                                            <div class="col-6">
                                                                <input class="btn btn-success btn-lg btn-block" type="button" name="btn_login" value="Login" onclick="AjaxFormLogin('massageEmail1', 'massagePass1', 'massageAll1')">
                                                            </div>
                                                            <div class="col-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <form method="post" action="" id="formMain2" name="formMain2">
                                            <div class="container mb-3 mt-3">
                                                <div class="row justify-content-center">
                                                    <div class="col-9">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control form-control-lg" name="user_name" placeholder="User Name" value="">
                                                            <p class="text-danger ml-2" id="massageUser"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" class="form-control form-control-lg" name="email_register" placeholder="Email" value="">
                                                            <p class="text-danger ml-2" id="massageEmailRegister"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control form-control-lg reset" name="password_register" placeholder="Password" value="">
                                                            <p class="text-danger ml-2" id="massagePassRegister"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password" class="form-control form-control-lg reset" name="confirm_password" placeholder="Confirm password" value="">
                                                            <p class="text-danger ml-2" id="massageConfirmPass"></p>
                                                        </div>
                                                        <div class="form-group ml-2">
                                                            <p class="text-danger" id="massageAll2"></p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-3"></div>
                                                            <div class="col-6">
                                                                <input class="btn btn-success btn-lg btn-block" type="button" name="btn_register" value="Register" onclick="AjaxFormRegister('massageUser', 'massageEmailRegister', 'massagePassRegister', 'massageConfirmPass', 'massageAll2')">
                                                            </div>
                                                            <div class="col-3"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>