<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <div class="container">
        <?php
            foreach ($data as $value){
        ?>
                <div class="row mt-5 border-bottom border-top border-dark p-2">

                    <div class="col-2">
                        <img src="/View/Image/<?php echo $value["image"]?>" alt="" class="img-fluid">
                    </div>
                    <div class="col-4 align-self-center">
                        <p class="f-size-title"><?php echo $value["name"]?></p>
                    </div>
                    <div class="col-2 align-self-center text-center">
                        <div class="row">
                            <div class="col-2 mr-4">
                                <button type="button" class="btn btn-secondary" data-toggle="tooltip" title="Уменьшить">+</button>
                            </div>
                            <div class="col-5">
                                <div class="row">
                                    <input type="text" class="form-control text-center" id="exampleInputEmail1" aria-describedby="emailHelp"  value="1">
                                </div>
                            </div>
                            <div class="col-3 ml-1">
                                <div class="row">
                                    <button type="button" class="btn btn-secondary" data-toggle="tooltip" title="Увеличить">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 align-self-center text-center">
                        <p class="f-size-name"><?php echo $value["price"]?></p>
                    </div>
                    <div class="col-2 align-self-center text-right">
                        <button type="button" class="btn btn-danger">Удалить</button>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-10 text-right f-size-total">
                Итого:
            </div>
            <div class="col-2 text-right f-size-title">
                41 499 грн
            </div>
        </div>
    </div>
    <?php
        require_once 'Template/footer.html';
    ?>
</body>
</html>