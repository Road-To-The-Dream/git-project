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
<body onload="TotalPriceProducts('total_price_products')">
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
                                        <div class="col-3 p-0">
                                            <button type="button" class="btn btn-secondary" data-toggle="tooltip" title="Увеличить" onclick="AjaxCountTotalPriceProduct('-','amount', 'total_price_product', 'total_price_products')">+</button>
                                        </div>
                                        <div class="col-4 p-0">
                                            <input type="text" class="form-control text-center" id="amount" aria-describedby="emailHelp" oninput="this.value = this.value.replace(/\D/g,'').substr(0,2)" disabled value="1">
                                        </div>
                                        <div class="col-3 p-0 text-right">
                                            <button type="button" class="btn btn-secondary" data-toggle="tooltip" title="Увеличить" onclick="AjaxCountTotalPriceProduct('+','amount', 'price_product', 'total_price_product', 'total_price_products')">+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2 align-self-center text-center">
                                    <p class="f-size-name" id="price_product"><?php echo $value["price"]?> грн</p>
                                </div>
                                <div class="col-2 align-self-center text-right">
                                    <button type="button" class="btn btn-danger" onclick="RemoveProduct(<?php echo $value["id"]?>)">Удалить</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9 text-right f-size-total">
                                    Итого:
                                </div>
                                <div class="col-2 text-right f-size-title">
                                    <p class="m-0" id="total_price_product">41 499</p>
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
    <div class="container mt-3">
        <div class="row">
            <div class="col-9 text-right f-size-total">
                Итого:
            </div>
            <div class="col-2 text-right f-size-title">
                <p class="m-0" id="total_price_products"></p>
            </div>
            <div class="col-1 text-right f-size-title m-0">
                <p class="m-0"> грн</p>
            </div>
        </div>
    </div>
    <?php
        require_once 'Template/footer.html';
    ?>
</body>
</html>