<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <?php
        require_once 'header.html';
    ?>
    <div class="container-fluid">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Ноутбуки, планшеты, компьютеры</a></li>
                    <li class="breadcrumb-item"><a href="#">Ноутбуки, компьютеры, аксессуары</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ноутбуки</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-3 mt-2">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i>Категории</div>
                        <ul class="list-group category_block">
                            <li class="list-group-item"><a href="catalog.php">Для несложных задач</a></li>
                            <li class="list-group-item"><a href="Katalog.php">Универсальные</a></li>
                            <li class="list-group-item"><a href="Katalog.php">Для бизнеса</a></li>
                            <li class="list-group-item"><a href="Katalog.php">Тонкие и лёгкие</a></li>
                            <li class="list-group-item"><a href="Katalog.php">Геймерские ноутбуки</a></li>
                            <li class="list-group-item"><a href="Katalog.php">Ноутбуки с SSD</a></li>
                            <li class="list-group-item"><a href="Katalog.php">Геймерские c Windows</a></li>
                            <li class="list-group-item"><a href="Katalog.php">Трансформеры 2 в 1</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-9">
                    <h1>Ноутбуки</h1>
                    <div class="row text-center justify-content-left" style="margin-top: 20px">
                        <?php
                        foreach ($data as $value){
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <a href="http://practice/product/show_product/<?php echo $value["id"];?>"><img class="card-img-top" src="/View/Image/<?php echo $value["image"]?>" alt="Card image cap"></a>
                                <div class="card-body">
                                    <a class="card-text f-size-name" href="http://practice/product/show_product/<?php echo $value["id"];?>"><?php echo $value["name"]?></a>
                                    <p class="card-text f-size-title f-size-total mt-2"><?php echo $value["price"]?></p>
                                    <input class="btn btn-success btn-block mt-2" type="submit" name="btn_login" value="Купить">
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
        require_once 'footer.html';
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>