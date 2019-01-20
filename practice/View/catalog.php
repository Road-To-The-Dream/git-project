<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Catalog - LAPTOP</title>
    <link rel="stylesheet" href="/View/CSS/cart.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="/View/JS/Show_filtration_products.js"></script>
    <script src="/View/JS/AddProductInCart.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="http://practice/main/show_main">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ноутбуки</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-3 mt-2">
                    <p>Подбор по параметрам</p>
                    <form method="post" action="" id="formFiltration" name="formFiltration">
                        <div class="card bg-light mb-3">
                            <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i>
                                Производитель
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php
                                $arr = array('Acer', 'Apple', 'Lenovo', 'Prestigio');
                                foreach ($arr as $a) {
                                    ?>
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="<?php echo $a; ?>" name="vendor[]" value="<?php echo $a; ?>">
                                            <label class="custom-control-label" id="message1" for="<?php echo $a; ?>"><?php echo $a; ?></label>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                                <li class="list-group-item text-center p-1">
                                    <input class="btn btn-outline-success btn-sm" type="button" name="btn_login" value="Show" onclick="AjaxFiltrationProducts('message1')">
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-9">
                            <h1>Ноутбуки</h1>
                        </div>
                        <div class="col-3 mt-2">
                            <div class="row justify-content-end">
                                <form class="form-inline mr-3">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                            Сортировка
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="http://practice/catalog/show_all/1/?category=<?=$_GET['category']?>">от дорогих к дешёвым</a>
                                            <a class="dropdown-item" href="http://practice/catalog/show_all/2/?category=<?=$_GET['category']?>">от дешёвых к дорогим</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center justify-content-left mt-4">
                        <?php
                        foreach ($data as $value){
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 mb-3">
                                <div class="card-deck h-100">
                                    <div class="card p-3">
                                        <div class="card-body p-0">
                                            <a href="http://practice/product/show_product/<?=$value["id"];?>"><img class="card-img-top" src="/View/Image/<?=$value["image"]?>" alt="Card image cap"></a>
                                            <div class="row justify-content-center mt-3">
                                                <a class="card-text f-size-name h-100 text-dark" href="http://practice/product/show_product/<?=$value["id"];?>"><?=$value["name"]?></a>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-3 p-0 mt-2" style="font-size: 18px">Цена:</div>
                                            <div class="col-6 text-center text-primary"><p style="font-weight: bold; font-size: 25px"><?=$value["price"]?></p></div>
                                            <div class="col-3 p-0 mt-2" style="font-size: 18px"><?=$value["unit"]?></div>
                                        </div>
                                        <?php
                                            if($value["amount"] > 0) {
                                                ?>
                                                <div class="row justify-content-center">
                                                    <div class="col-4 p-0 mr-2">
                                                        <input class="btn btn-success btn-block mt-2" type="submit" name="btn_login" value="Купить">
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <a class='btn btn-warning text-white pl-1 mt-2' onclick="AjaxAddInCart(<?=$value["id"];?>, 'amount_products_in_cart')"><img class="mr-2" src='/View/Image/add_cart.png'>Добавить</a>
                                                    </div>
                                                </div>
                                        <?php
                                            } else {
                                                ?>
                                                <div class="row justify-content-center mt-3">
                                                    <div class="col-auto">
                                                        <img src="/View/Image/No.png" alt="no">
                                                    </div>
                                                    <div class="col-auto pt-1 pl-0">
                                                        Нет в наличии
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div>
                <ul class="pagination pagination-lg pagination justify-content-end" style="margin: 50px 0 50px">
                    <li class="page-item disabled">
                        <a class="page-link" href="#">&laquo;</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
        require_once 'Template/footer.html';
    ?>
</body>
</html>