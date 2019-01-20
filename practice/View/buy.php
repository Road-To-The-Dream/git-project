<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buy - LAPTOP</title>
    <link rel="stylesheet" href="/View/CSS/cart.css">
    <script src="/View/JS/RemoveProductFromCart.js"></script>
</head>
<body>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://practice/main/show_main">Главная</a></li>
            <li class="breadcrumb-item"><a href="http://practice/catalog/show_all">Ноутбуки</a></li>
            <li class="breadcrumb-item active" aria-current="page">Оформление заказа</li>
        </ol>
    </nav>
</div>
<div class="container">
    <p>Оформление заказа</p>
    <p>Сушко Сергей, +380 (96) 69-98-368</p>
    <p class="mt-4 mb-1">Информация о заказе</p>
    <div class="shadow mb-4 bg-white rounded border border-primary p-2">
        <div class="container">
            <form class="ml-2 mt-4" method="post" action="" id="formMain" name="formMain">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="last_name" class="col-3 col-form-label">Last Name</label>
                            <div class="col">
                                <input type="text" class="form-control form-control-md" name="last_name" id="last_name" placeholder="Фамилия" value="<?=$data[1]["last_name"];?>" autofocus>
                                <p class="text-danger ml-2" id="messageLastName"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-3 col-form-label">First Name</label>
                            <div class="col">
                                <input type="text" class="form-control form-control-md" name="first_name" id="first_name" placeholder="Имя" value="<?=$data[1]["first_name"];?>">
                                <p class="text-danger ml-2" id="messageFirstName"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-3 col-form-label">Email</label>
                            <div class="col">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="email" class="form-control form-control-md" name="email_register" id="email" placeholder="Email" value="<?=$data[1]["email"];?>">
                                </div>
                                <p class="text-danger ml-2" id="messageEmail"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-3 col-form-label">Phone</label>
                            <div class="col">
                                <input type="text" class="form-control form-control-md bfh-phone" name="phone" id="phone" data-format="+380 (dd) dd-dd-ddd" value="<?=$data[1]["phone"];?>">
                                <p class="text-danger ml-2" id="messagePhone"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-3 col-form-label">City</label>
                            <div class="col">
                                <input type="text" class="form-control form-control-md" name="city" id="first_name" placeholder="Город" value="">
                                <p class="text-danger ml-2" id="messageCity"></p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-auto">
                                <button onclick="" type="button" class="btn btn-success">Подтвердить заказ</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="shadow mb-4 bg-white rounded border border-primary p-2">
                            <div class="row">
                                <div class="col-3 mt-4">
                                    <a href="http://practice/product/show_product/<?=$data[0]["id"];?>"><img class="card-img-top" src="/View/Image/HP%20EliteBook%20830%20G5%20(3ZG02ES)%20(1).jpg" alt="Card image cap"></a>
                                </div>
                                <div class="col-9 f-size-name">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <a href="http://practice/product/show_product/<?=$data[0]["id"];?>" class="text-dark"><p class="f-size-name"></p><?=$data[0]["name"];?></a>
                                        </div>
                                    </div>
                                    <div class="row text-success">
                                        <div class="col-6">
                                            <p><?=$data[0]["amount"];?> шт.</p>
                                        </div>
                                        <div class="col-6">
                                            <p><?=$data[0]["price"];?> грн</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row d-flex justify-content-end border-top border-secondary mt-3">
                                    <div class="col-auto f-size-total align-self-end mt-2">
                                        Итого:
                                    </div>
                                    <div class="col-auto p-0 text-primary font-weight-bold f-size-title align-self-end">
                                        <p class="m-0" id="total_price_product"><?=$data[0]["total_price"];?></p>
                                    </div>
                                    <div class="col-auto text-right font-weight-bold f-size-title m-0 align-self-end">
                                        <p class="m-0"> грн</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

