<?php
    require_once '../Controller/controller_product.php';
    $obj = new controller_product();
    $product = $obj->action_show_product($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once 'header.html';
    ?>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Ноутбуки, планшеты, компьютеры</a></li>
                <li class="breadcrumb-item"><a href="#">Ноутбуки, компьютеры, аксессуары</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ноутбуки</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-4">
        <div class="row mb-3" style="border-bottom: #090909 1px solid">
            <div class="col-4 text-align-bottom f-size-total">
                <p class="f-size-title"><?php echo $product['name']?></p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-8 col-lg-8 text-right">
                <p>Поделится с друзьями
                    <a href="#"><img src="Image/Instagram_icons.png" alt="Instagram"></a>
                    <a href="#"><img src="Image/VK.com_icons.png" alt="VK"></a>
                    <a href="#"><img src="Image/Twitter_icons.png" alt="Twitter"></a>
                    <a href="#"><img src="Image/Facebook_icons.png" alt="Facebook"></a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5 align-self-start text-center" >
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="Image/<?php echo $product['image']?>" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="Image/Product3.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="Image/Product2.jpg" alt="Third slide">
                        </div>
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
                    <div class="col-md-7 col-lg-8 col-xl-9 text-align-bottom f-size-total">
                       <p class="f-size-title f-size-total">Цена: <?php echo $product['price']?>.</p>
                    </div>
                    <div class="col-md-5 col-lg-4 col-xl-3">
                        <input class="btn btn-success btn-lg btn-block" type="button" name="btn_logout" value="Купить">
                    </div>
                </div>
                <div class="row">
                    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Доставка</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Оплата</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="garant-tab" data-toggle="tab" href="#garant" role="tab" aria-controls="garant" aria-selected="false">Гарантия</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                        <div class="tab-pane fade" id="garant" role="tabpanel" aria-labelledby="garant-tab">
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
        </ul>
        <div class="tab-content pt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <p style="text-indent: 25px;">
                    Игровая и перспективная серия ноутбуков Nitro 5 от Acer способна выполнять роль не только великолепной игровой машины, но и достаточно яркого и сдержанного ноутбука для повседневных производительных задач. Его идеально сбалансированная конфигурация компонентов, великолепная система охлаждения, которая быстро и тихо справляется даже со сложными заданиями и невероятно интересный дизайн способны расположить к себе практически любого. А если учесть, что ноутбук Nitro 5 обладает внушительным игровым потенциалом, оснащаясь качественными комплектующими, то практически не найдется человека, который бы остался к нему равнодушен.
                </p>
            </div>
            <div class="tab-pane fade pl-4" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Вес</span>
                    </dt>
                    <dd>36 шт</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Количество на поддоне</span>
                    </dt>
                    <dd>48 шт</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Прочность на сжатие</span>
                    </dt>
                    <dd>200-400 кгс/см</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Вес</span>
                    </dt>
                    <dd>36 шт</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Количество на поддоне</span>
                    </dt>
                    <dd>48 шт</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Прочность на сжатие</span>
                    </dt>
                    <dd>200-400 кгс/см</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Вес</span>
                    </dt>
                    <dd>36 шт</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Количество на поддоне</span>
                    </dt>
                    <dd>48 шт</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Прочность на сжатие</span>
                    </dt>
                    <dd>200-400 кгс/см</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Вес</span>
                    </dt>
                    <dd>36 шт</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Количество на поддоне</span>
                    </dt>
                    <dd>48 шт</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Прочность на сжатие</span>
                    </dt>
                    <dd>200-400 кгс/см</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Вес</span>
                    </dt>
                    <dd>36 шт</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Количество на поддоне</span>
                    </dt>
                    <dd>48 шт</dd>
                </dl>
                <dl class="dl-inline">
                    <dt class="dt-dotted">
                        <span>Прочность на сжатие</span>
                    </dt>
                    <dd>200-400 кгс/см</dd>
                </dl>
            </div>
        </div>
        <!--Tabs-->
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="JS/script.js"></script>
</body>
</html>