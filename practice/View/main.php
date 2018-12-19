<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <?php
        require_once 'header.html';
    ?>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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

    </div>
    <?php
        require_once 'footer.html';
    ?>
    <script src="/View/JS/script.js"></script>
</body>
</html>