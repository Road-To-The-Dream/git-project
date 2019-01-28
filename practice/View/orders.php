<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart - LAPTOP</title>
    <link rel="stylesheet" href="/View/CSS/cart.css">
    <script src="/View/JS/ShowTotalPriceProduct.js"></script>
    <script src="/View/JS/ShowOrders.js"></script>
</head>
<body>
<div class="cart-container">
    <div id="content">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://practice/main">Главная</a></li>
                    <li class="breadcrumb-item"><a href="http://practice/catalog">Ноутбуки</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Заказы</li>
                </ol>
            </nav>
        </div>
        <div class="container mt-5">
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
                                            <p class="m-0"><?= $data['products'][$i]->getAmount() ?></p>
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
                                    <div class="col-auto p-0 text-primary font-weight-bold f-size-title align-self-end">
                                        <p class="m-0"
                                           id="total_price_product<?= $data['products'][$i]->getProductId() ?>"><?= $data['products'][$i]->getTotalPrice() ?></p>
                                    </div>
                                    <div class="col-auto text-right font-weight-bold f-size-title m-0 align-self-end">
                                        <p class="m-0"> грн</p>
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

