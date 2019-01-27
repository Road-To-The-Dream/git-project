<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success - LAPTOP</title>
</head>
<body>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="http://practice/main">Главная</a></li>
            <li class="breadcrumb-item"><a href="http://practice/catalog">Ноутбуки</a></li>
            <li class="breadcrumb-item active" aria-current="page">...</li>
        </ol>
    </nav>
</div>
<div class="container">
    <p class="mt-5">Спасибо, ваш заказ принят</p>
    <p class="mt-4 mb-1 text-secondary">Заказ № <?= 111 ?></p>
    <div class="shadow mb-4 bg-white rounded border border-primary p-2">
        <div class="row">
            <div class="col-3">
                <a href="http://practice/product/index/<?= $data['product'][0]->getId(); ?>"><img
                        class="card-img-top"
                        src="/View/Image/<?= $data['image']->getImg(); ?>"
                        alt="Card image cap"></a>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col">
                        <a href="http://practice/product/index/<?= $data['product'][0]->getId(); ?>"
                           class="text-dark"><p
                                class="f-size-name"></p><?= $data['product'][0]->getName(); ?>
                        </a>
                    </div>
                </div>
                <div class="row f-size-name mt-2">
                    <div class="col-6">
                        <p><?= $data['amount']; ?> шт.</p>
                    </div>
                    <div class="col-6">
                        <p><?= $data['product'][0]->getPrice(); ?> грн</p>
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
                    <p class="m-0" id="total_price_product"><?= $data['total_price'] ?></p>
                </div>
                <div class="col-auto text-right font-weight-bold f-size-title m-0 align-self-end">
                    <p class="m-0"> грн</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>