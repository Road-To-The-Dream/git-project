<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAPTOP | Product</title>
    <link rel="stylesheet" href="/View/CSS/cart.css">
    <script src="/View/JS/AddProductInCart.js"></script>
    <script src="/View/JS/AddingComments.js"></script>
    <script src="/View/JS/RemoveComments.js"></script>
</head>
<body>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="http://practice/main/show_main">Главная</a></li>
                <li class="breadcrumb-item"><a href="http://practice/catalog/show_all">Ноутбуки</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $data['info_product'][0]['name']?></li>
            </ol>
        </nav>
    </div>
    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-6 col-lg-7 text-align-bottom f-size-total">
                <p class="f-size-title"><?= $data['info_product'][0]['name']?></p>
            </div>
            <div class="col-md-6 col-lg-5 text-right">
                <p class="mt-1">
                    Код товара: <span style="font-weight: bold"><?= $data['info_product'][0]['id']?></span>
                </p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="col-12" style="border-bottom: #090909 1px solid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5 align-self-start text-center" >
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
                    <div class="carousel-inner">
                        <?php for($i = 0; $i < count($data['images']); $i++) { ?>
                            <div class="carousel-item <?php if($i==0) { ?> active <?php } ?> ">
                                <img class="d-block w-100" src="/View/Image/<?=$data['images'][$i]['img'];?>" alt="First slide">
                            </div>
                        <?php } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-md-7 col-lg-8 col-xl-9 text-align-bottom">
                        <div class="row">
                            <div class="col-auto align-self-end pb-1" style="font-size: 18px">
                                Цена :
                            </div>
                            <div class="col-auto p-0 m-0 text-primary align-self-end">
                                <p class="m-0" id="total_price_product" style="font-weight: bold; font-size: 30px"><?=$data['info_product'][0]['price']?></p>
                            </div>
                            <div class="col-auto text-primary m-0 pl-1 pt-1 align-self-start">
                                <p class="m-0"><?=$data['info_product'][0]['unit']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <input class="btn btn-success btn-lg btn-block" type="button" name="btn_logout" value="Купить">
                        <a class='btn btn-warning btn-lg text-white btn-block pl-1 mt-2' onclick="AjaxAddInCart(<?=$data['info_product'][0]['id'];?>, 'amount_products_in_cart')"><img class="mr-2" src='/View/Image/add_cart.png'>Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="delivery-tab" data-toggle="tab" href="#delivery" role="tab" aria-controls="delivery" aria-selected="true">Доставка</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">Оплата</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="guarantee-tab" data-toggle="tab" href="#guarantee" role="tab" aria-controls="guarantee" aria-selected="false">Гарантия</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                            <ol>
                                <li>
                                    Курьером по Киеву. Стоимость доставки оборудования - 50 грн. Обычно, если вы разместили заказ до 12:00 — мы доставим его в тот же день. В любом случае, во время заказа наши менеджеры сразу согласуют с вами время доставки.
                                </li>
                                <li>
                                    Доставка с услугой Мультитест по Киеву, Харькову и пригороду. Стоимость услуги - 100 грн, выезд за пределы города оплачивается из расчета 3 грн за км в обе стороны. (4 грн зимой)
                                </li>
                                <li>
                                    Доставка по Украине сторонними службами доставки. Мы доставляем товары с помощью <br>служб доставки "Новая почта" и "Укрпочта". Стоимость доставки - 50 грн. Доставка осуществляется только после полной предоплаты товара.
                                </li>
                            </ol>
                        </div>
                        <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                            <ol>
                                <li>
                                    Наличная оплата возможна только при доставке в Киеве или заказе услуги Мультитест в Киеве и Харькове. Оплата производится исключительно в национальной валюте. В подтверждение оплаты мы выдаем вам наряд.
                                </li>
                                <li>
                                    Безналичная оплата осуществляется следующим способом: после оформления заказа, менеджер электронной почтой вышлет Вам счет-фактуру, который Вы сможете оплатить в кассе отделения любого банка или с расчетного счета Вашей фирмы. Для юридических лиц пакет всех необходимых документов предоставляется вместе с товаром.
                                </li>
                                <li>
                                    С помощью системы Интернет-расчетов WebMoney клиенты имеют возможность производить моментальную оплату через Интернет. Чтобы оплатить покупку товара в WMZ, необходимо воспользоваться программой Webmoney Keeper или онлайн-интерфейсом Webmoney Keeper Light.
                                </li>
                            </ol>
                        </div>
                        <div class="tab-pane fade" id="guarantee" role="tabpanel" aria-labelledby="guarantee-tab">
                            <p style="text-indent: 25px;">
                                На товары предоставляется гарантия, подтверждающая обязательства по отсутствию в товаре заводских дефектов. Гарантия предоставляется на срок от 2-х недель до 36 месяцев в зависимости <br> от сервисной политики производителя. Срок гарантии указан в описании каждого товара на нашем сайте. Подтверждением гарантийных обязательств служит гарантийный талон производителя, или наряд нашей компании.
                            </p>
                            <p style="text-indent: 25px;">
                                Пожалуйста, проверьте комплектность и отсутствие дефектов в товаре при его получении (комплектность определяется описанием изделия или руководством по его эксплуатации).
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Tabs-->
        <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Описание</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="specifications-tab" data-toggle="tab" href="#specifications" role="tab" aria-controls="specifications" aria-selected="false">Характеристики</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="comment-tab" data-toggle="tab" href="#comment" role="tab" aria-controls="comment" aria-selected="false">
                    Комментарии (<?php echo count($data['comments']);?>)
                </a>
            </li>
        </ul>
        <div class="tab-content pt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <p style="text-indent: 25px;">
                    <?=$data['info_product'][0]['description']?>
                </p>
            </div>
            <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                <div class="container f-size-character">
                    <div class="row">
                        <!--LEFT COL-->
                        <div class="col-6">
                            <div class="row">
                                <p class="text-secondary f-size-name ml-1 mb-2">Система</p>
                            </div>
                            <div class="row">
                                <div class="shadow mb-4 bg-white rounded" style="width: 98%">
                                    <div>
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-5 font-weight-bold">Тип</div>
                                                    <div class="col-7 text-right">ноутбук</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-5 font-weight-bold">Тип.конфиг.</div>
                                                    <div class="col-7 text-right">AMD A8 / 2 ГГц / 4 Гб / 500 Гб / DVD</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-7 font-weight-bold">Макс. объем оперативной памяти</div>
                                                    <div class="col-5 text-right">16 Гб</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p class="text-secondary f-size-name ml-1 mb-2">Экран</p>
                            </div>
                            <div class="row">
                                <div class="shadow mb-4 bg-white rounded" style="width: 98%">
                                    <div>
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-5 font-weight-bold">Диагональ</div>
                                                    <div class="col-7 text-right">15.6"</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-5 font-weight-bold">Разрешение</div>
                                                    <div class="col-7 text-right">1366 x 768</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-5 font-weight-bold">Тип экрана</div>
                                                    <div class="col-7 text-right">глянцевый</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p class="text-secondary f-size-name ml-1 mb-2">Подключение и интерфейсы</p>
                            </div>
                            <div class="row">
                                <div class="shadow mb-4 bg-white rounded" style="width: 98%">
                                    <div>
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-5 font-weight-bold">Гигабитный Ethernet</div>
                                                    <div class="col-7 text-right">Есть</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-4 font-weight-bold">Интерфейсы</div>
                                                    <div class="col-8 text-right">USB 3.0x1, USB 2.0x2, RJ-45, HDMI, VGA</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--LEFT COL-->
                        <!--RIGHT COL-->
                        <div class="col-6">
                            <div class="row">
                                <p class="text-secondary f-size-name ml-3 mb-2">Хранение данных</p>
                            </div>
                            <div class="row justify-content-end">
                                <div class="shadow mb-4 bg-white rounded" style="width: 98%">
                                    <div>
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-5 font-weight-bold">Скорость вращения диска</div>
                                                    <div class="col-7 text-right">5400 об/мин</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p class="text-secondary f-size-name ml-3 mb-2">Питание</p>
                            </div>
                            <div class="row justify-content-end">
                                <div class="shadow mb-4 bg-white rounded" style="width: 98%">
                                    <div>
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-6 font-weight-bold">Время автономной работы</div>
                                                    <div class="col-6 text-right">4.5 ч</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-6 font-weight-bold">Кол-во ячеек аккумулятора</div>
                                                    <div class="col-6 text-right">6</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-5 font-weight-bold">Емкость аккумулятора</div>
                                                    <div class="col-7 text-right">2500 мА*ч</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <p class="text-secondary f-size-name ml-3 mb-2">Корпус</p>
                            </div>
                            <div class="row justify-content-end">
                                <div class="shadow mb-4 bg-white rounded" style="width: 98%">
                                    <div>
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-5 font-weight-bold">Вес</div>
                                                    <div class="col-7 text-right">2.5 кг</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-5 font-weight-bold">Габариты</div>
                                                    <div class="col-7 text-right">256x256x30.3 мм</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-6 font-weight-bold">Сканер отпечатков пальцев</div>
                                                    <div class="col-6 text-right">Нет</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item list-group-item-action">
                                                <div class="row">
                                                    <div class="col-5 font-weight-bold">Подсветка клавиатуры</div>
                                                    <div class="col-7 text-right">Есть</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--RIGHT COL-->
                    </div>
                </div>
            </div>
            <!--COMMENT-->
            <div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="comment-tab">
                <div class="container">
                    <!--ADDED COMMENT-->
                    <div class="row mb-3">
                        <div class="col-12">
                            <textarea class="form-control" id="text_comment" rows="4" placeholder="Добавьте Ваш комментарий"></textarea>
                            <div class="row d-flex justify-content-end">
                                <div class="col-auto">
                                    <a class='btn btn-primary mt-2 text-white' onclick="AjaxAddComment('text_comment', <?= $data['info_product'][0]['id']?>)"><img class="mr-2" src='/View/Image/add_comment.png'>Добавить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--ADDED COMMENT-->
                    <?php
                    for($i = 0; $i < count($data['comments']); $i++) {
                            ?>
                        <div class="shadow mb-5 bg-white rounded">
                            <div class="card bg-border mb-4">
                                <div class="card-header bg">
                                    <div class="row">
                                        <div class="col">
                                            <div class="font-comment-name"><?= $data['comments'][$i]['first_name']?></div>
                                            <span class="font-comment-date">Дата добавления: <?= $data['comments'][$i]['date_added']?></span>
                                        </div>
                                        <div class="row d-flex justify-content-end">
                                            <?php
                                                if($_SESSION['user_id'] == $data['comments'][$i]['client_id']) {
                                                    ?>
                                                <div class="col-auto">
                                                    <a href="javascript:AjaxRemoveComment(<?= $data['comments'][$i]['id']?>)" class="badge badge-warning">Delete own comment</a>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text "><?= $data['comments'][$i]['content']?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <!--COMMENT-->
        </div>
        <!--Tabs-->
    </div>
    <?php
        require_once 'Template/footer.html';
    ?>
</body>
</html>