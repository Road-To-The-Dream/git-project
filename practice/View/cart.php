<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart - LAPTOP</title>
    <link rel="stylesheet" href="/View/CSS/cart.css">
    <script src="/View/JS/ShowTotalPriceProduct.js"></script>
    <script src="/View/JS/ShowTotalPriceProductsForCart.js"></script>
    <script src="/View/JS/RemoveProductFromCart.js"></script>
    <script>
        jQuery(document).ready(function () {
            $('input[name="amount"]').val(1)
        });
    </script>
</head>
<body>
<div class="cart-container">
    <div id="content">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://practice/main">Главная</a></li>
                    <li class="breadcrumb-item"><a href="http://practice/catalog">Ноутбуки</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Корзина</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-4 mb-5">
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
                            <a href="http://practice/cart/cleanCart" class='btn btn-primary text-white pl-1 mt-2'><img
                                        class="mr-2" src='/View/Image/Cart/Buy.png'>Clean cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php
            for ($i = 0; $i < count($data['products']); $i++) {
                ?>
                <div class="container">
                    <div class="row mt-3">
                        <form action="http://practice/buy" method="POST">
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
                                            <a data-toggle="tooltip" title="Удалить товар"
                                               onclick="RemoveProduct(<?= $data['products'][$i]->getProductId() ?>, 'amount<?= $data['products'][$i]->getProductId() ?>')"
                                               style="cursor: pointer">
                                                <img class="pb-2" src="/View/Image/Cart/Delete_product.png"
                                                     alt="Delete product">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-2">
                                        <a href="http://practice/product/index/<?= $data['products'][$i]->getProductId() ?>"><img
                                                    class="card-img-top"
                                                    src="/View/Image/<?= $data['image'][$i]->getImg() ?>"
                                                    alt="Card image cap"></a>
                                    </div>
                                    <div class="col-4 align-self-center">
                                        <a href="http://practice/product/index/<?= $data['products'][$i]->getProductId() ?>"
                                           class="text-dark"><p
                                                    class="f-size-title font-weight-bold"><?= $data['name_products'][$i]->getName() ?></p>
                                        </a>
                                    </div>
                                    <div class="col-2 align-self-center">
                                        <div class="row justify-content-center">
                                            <div class="col-auto mr-1 p-0">
                                                <a class='btn btn-secondary' data-toggle="tooltip" title="Уменьшить"
                                                   onclick="AjaxCountTotalPriceProduct('-',
                                                           '<?= $data['products'][$i]->getProductId() ?>',
                                                           'amount<?= $data['products'][$i]->getProductId() ?>',
                                                           'price_product<?= $data['products'][$i]->getProductId() ?>',
                                                           'total_price_product<?= $data['products'][$i]->getProductId() ?>',
                                                           'price_all_products')">
                                                    <img src='/View/Image/Cart/Minus.png'></a>
                                            </div>
                                            <div class="col-4 p-0">
                                                <input type="text" class="form-control text-center" name="amount"
                                                       id="amount<?= $data['products'][$i]->getProductId() ?>"
                                                       aria-describedby="emailHelp"/>
                                            </div>
                                            <div class="col-auto ml-1 p-0 text-right">
                                                <a class='btn btn-secondary' data-toggle="tooltip" title="Увеличить"
                                                   onclick="AjaxCountTotalPriceProduct('+',
                                                           '<?= $data['products'][$i]->getProductId() ?>',
                                                           'amount<?= $data['products'][$i]->getProductId() ?>',
                                                           'price_product<?= $data['products'][$i]->getProductId() ?>',
                                                           'total_price_product<?= $data['products'][$i]->getProductId() ?>',
                                                           'price_all_products')">
                                                    <img src='/View/Image/Cart/Added.png'></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 align-self-center text-center p-0 pl-5">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-auto p-0 text-success f-size-title">
                                                <p class="m-0"
                                                   id="price_product<?= $data['products'][$i]->getProductId() ?>"><?= $data['products'][$i]->getPrice() ?></p>
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
                                    <input name="IDProduct" type="text" hidden
                                           value="<?= $data['products'][$i]->getProductId() ?>">
                                    <input name="price_product" id="price_product" type="text" hidden
                                           value="<?= $data['products'][$i]->getPrice() ?>">
                                    <div class="col-auto p-0 text-primary font-weight-bold f-size-title align-self-end">
                                        <p class="m-0"
                                           id="total_price_product<?= $data['products'][$i]->getProductId() ?>"><?= $data['products'][$i]->getPrice() ?></p>
                                    </div>
                                    <div class="col-auto text-right font-weight-bold f-size-title m-0 align-self-end">
                                        <p class="m-0"> грн</p>
                                    </div>
                                    <div class="col-auto align-self-end">
                                        <button type="submit" class='btn btn-primary text-white'><img class="mr-2"
                                                                                                      src='/View/Image/Cart/Buy.png'>Buy
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div id="footer">
        <?php
        require_once 'Template/footer.php';
        ?>
    </div>
</div>
</body>
</html>

