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
<body onload="TotalPriceProducts('price_all_products')">
    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-auto f-size-total">
                Товаров в корзине на сумму:
            </div>
            <div class="col-auto p-0 f-size-title">
                <p class="m-0" id="price_all_products"></p>
            </div>
            <div class="col-auto pl-2 f-size-title m-0">
                <p class="m-0">грн</p>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
            foreach ($data as $value){
        ?>
                <div class="container">
                    <div class="row mt-3">
                        <div class="shadow mb-4 bg-white rounded border border-primary p-2">
                            <div class="container">
                                <div class="row border-bottom border-dark mb-3">
                                    <div class="col-2"></div>
                                    <div class="col-4 text-center text-muted">
                                        Наименование товара
                                    </div>
                                    <div class="col-2 text-center text-muted">
                                        Количество
                                    </div>
                                    <div class="col-2 text-center text-muted">
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
                                            <input type="text" class="form-control text-center" id="amount<?php echo $value["id"]?>" aria-describedby="emailHelp" oninput="this.value = this.value.replace(/\D/g,'').substr(0,2)" disabled value="1">
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
                                <div class="col-2 align-self-center text-center">
                                    <p class="f-size-name" id="price_product<?php echo $value["id"]?>"><?php echo $value["price"]?> грн</p>
                                </div>
                                <div class="col-2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 text-right f-size-total">
                                    Итого:
                                </div>
                                <div class="col-2 text-right f-size-title">
                                    <p class="m-0" id="total_price_product<?php echo $value["id"]?>"><?php echo $value["price"]?></p>
                                </div>
                                <div class="col-1 text-right f-size-title m-0">
                                    <p class="m-0"> грн</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
    <?php
        require_once 'Template/footer.html';
    ?>
</body>
</html>