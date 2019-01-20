<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart - LAPTOP</title>
    <link rel="stylesheet" href="/View/CSS/cart.css">
    <script src="/View/JS/ShowTotalPriceProduct.js"></script>
    <script src="/View/JS/ShowTotalPriceProducts.js"></script>
    <script src="/View/JS/RemoveProductFromCart.js"></script>
</head>
<body>
<div class="cart-container">
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://practice/main/show_main">Главная</a></li>
            <li class="breadcrumb-item"><a href="http://practice/catalog/show_all">Ноутбуки</a></li>
            <li class="breadcrumb-item active" aria-current="page">Корзина</li>
        </ol>
    </nav>
</div>
    <div class="container">
    <?php
        if($data == "") {
            ?>
                <p class="text-danger" style="font-size: 20px">В корзине нет товаров</p>
            <?php
        } else {
            ?>
            <div class="row">
                <div class="col-auto f-size-total align-self-end">
                    Товаров в корзине на общую сумму:
                </div>
                <div class="col-auto p-0 f-size-title align-self-end">
                    <p class="m-0 text-success font-weight-bold" id="price_all_products"></p>
                </div>
                <div class="col-auto pl-2 f-size-title m-0 font-weight-bold align-self-end">
                    <p class="m-0">грн</p>
                </div>
                <div class="col align-self-end">
                    <div class="row d-flex justify-content-end">
                        <div class="col-auto">
                            <a class='btn btn-primary text-white pl-1 mt-2'><img class="mr-2" src='/View/Image/Cart/Buy.png'>Оформить заказ</a>
                        </div>
                    </div>
                </div>
            </div>
                <?php
                foreach ($data as $value){
                    ?>
                    <div class="container">
                        <div class="row mt-3">
                            <form action="http://practice/buy/show_buy" method="POST">
                                <div class="shadow mb-4 bg-white rounded border border-primary p-2">
                                    <div class="container">
                                        <div class="row border-bottom border-dark mb-3">
                                            <div class="col-2"></div>
                                            <div class="col-4 text-center text-muted">
                                                Наименование товара
                                            </div>
                                            <div class="col-2 pl-4 text-center text-muted">
                                                Количество
                                            </div>
                                            <div class="col-2 pl-4 text-center text-muted">
                                                Цена
                                            </div>
                                            <div class="col-2 text-right p-0">
                                                <a data-toggle="tooltip" title="Удалить товар" onclick="RemoveProduct(<?php echo $value["id"]?>)" style="cursor: pointer">
                                                    <img class="pb-2" src="/View/Image/Cart/Delete_product.png" alt="Delete product">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <a href="http://practice/product/show_product/<?=$value["id"];?>"><img class="card-img-top" src="/View/Image/<?=$value["image"]?>" alt="Card image cap"></a>
                                        </div>
                                        <div class="col-4 align-self-center">
                                            <a href="http://practice/product/show_product/<?=$value["id"];?>" class="text-dark"><p class="f-size-title font-weight-bold"><?php echo $value["name"]?></p></a>
                                        </div>
                                        <div class="col-2 align-self-center">
                                            <div class="row justify-content-center">
                                                <div class="col-auto mr-1 p-0">
                                                    <a class='btn btn-secondary' data-toggle="tooltip" title="Уменьшить" onclick="AjaxCountTotalPriceProduct('-',
                                                            'amount<?php echo $value["id"]?>',
                                                            'price_product<?php echo $value["id"]?>',
                                                            'total_price_product<?php echo $value["id"]?>',
                                                            'price_all_products')">
                                                        <img src='/View/Image/Cart/Minus.png'></a>
                                                </div>
                                                <div class="col-4 p-0">
                                                    <input type="text" class="form-control text-center" name="amount" id="amount<?php echo $value["id"]?>" aria-describedby="emailHelp" value="1" />
                                                </div>
                                                <div class="col-auto ml-1 p-0 text-right">
                                                    <a class='btn btn-secondary' data-toggle="tooltip" title="Увеличить" onclick="AjaxCountTotalPriceProduct('+',
                                                            'amount<?php echo $value["id"]?>',
                                                            'price_product<?php echo $value["id"]?>',
                                                            'total_price_product<?php echo $value["id"]?>',
                                                            'price_all_products')">
                                                        <img src='/View/Image/Cart/Added.png'></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 align-self-center text-center p-0 pl-5">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-auto p-0 text-success f-size-title">
                                                    <p class="m-0" id="price_product<?php echo $value["id"]?>"><?php echo $value["price"]?></p>
                                                </div>
                                                <div class="col-auto text-right font-weight-bold f-size-title m-0">
                                                    <p class="m-0"> грн</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                    <div class="row d-flex justify-content-end">
                                        <div class="col-auto f-size-total align-self-end">
                                            Итого:
                                        </div>
                                        <input name="IDProduct" type="text" hidden value="<?php echo $value["id"]?>">
                                        <div class="col-auto p-0 text-primary font-weight-bold f-size-title align-self-end">
                                            <p class="m-0" id="total_price_product<?php echo $value["id"]?>"><?php echo $value["price"]?></p>
                                        </div>
                                        <div class="col-auto text-right font-weight-bold f-size-title m-0 align-self-end">
                                            <p class="m-0"> грн</p>
                                        </div>
                                        <div class="col-auto align-self-end">
                                            <button type="submit" class='btn btn-primary text-white'><img class="mr-2" src='/View/Image/Cart/Buy.png'>Купить</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                }
                ?>

            <?php
        }
    ?>
    </div>
    <?php
    require_once 'Template/footer.html';
    ?>
</div>
</body>
</html>

