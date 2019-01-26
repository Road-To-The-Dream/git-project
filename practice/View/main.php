<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <title>Shop - LAPTOP</title>
</head>
<body>
    <div class="container mb-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
            <ol class="carousel-indicators">
                <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/View/Image/main/Image1.jpg" alt="" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="/View/Image/main/Image2.jpg" alt="" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="/View/Image/main/Image3.jpg" alt="" class="d-block w-100">
                </div>
            </div>
            <a href="#carouselExampleIndicators" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a href="#carouselExampleIndicators" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container">
            <div class="row text-center justify-content-center mt-3 ml-4">
                <div class="col-3">
                    <div class="card h-100" style="width: 12rem;">
                        <a href="http://practice/catalog"><img class="card-img-top" src="/View/Image/main/Card_image7.jpg" alt="Card image cap"></a>
                        <div class="card-body">
                            <a href=""><h6>Все ноутбуки</h6></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <a href="http://practice/catalog/index/?category=2">
                        <div class="card h-100" style="width: 12rem;">
                            <img class="card-img-top" src="/View/Image/main/Card_image1.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h6>Универсальные</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <div class="card h-100" style="width: 12rem;">
                        <a href="http://practice/catalog/index/?category=3"><img class="card-img-top" src="/View/Image/main/Card_image2.jpg" alt="Card image cap"></a>
                        <div class="card-body">
                            <a href=""><h6>Для бизнеса</h6></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card h-100" style="width: 12rem;">
                        <a href="http://practice/catalog/index/?category=4"><img class="card-img-top" src="/View/Image/main/Card_image3.jpg" alt="Card image cap"></a>
                        <div class="card-body">
                            <a href=""><h6>Тонкие и лёгкие</h6></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center justify-content-center mt-3 ml-4">
                <div class="col-3">
                    <div class="card h-100" style="width: 12rem;">
                        <a href="http://practice/catalog/index/?category=5"><img class="card-img-top" src="/View/Image/main/Card_image5.jpg" alt="Card image cap"></a>
                        <div class="card-body">
                            <a href=""><h6>Ноутбуки с SSD</h6></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card h-100" style="width: 12rem;">
                        <a href="http://practice/catalog/index/?category=6"><img class="card-img-top" src="/View/Image/main/Card_image6.jpg" alt="Card image cap"></a>
                        <div class="card-body">
                            <a href=""><h6>Ноутбуки Windows</h6></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card h-100" style="width: 12rem;">
                        <a href="http://practice/catalog/index/?category=7"><img class="card-img-top" src="/View/Image/main/Card_image8.jpg" alt="Card image cap"></a>
                        <div class="card-body">
                            <a href=""><h6>Для несложных задач</h6></a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card h-100" style="width: 12rem;">
                        <a href="http://practice/catalog/index/?category=8"><img class="card-img-top" src="/View/Image/main/Card_image4.jpg" alt="Card image cap"></a>
                        <div class="card-body">
                            <a href=""><h6>Геймерские ноутбуки</h6></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        require_once 'Template/footer.html';
    ?>
</body>
</html>