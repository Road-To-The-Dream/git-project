<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/View/Image/header/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/View/CSS/cart.css">
</head>
<body>
<div class="row mt-3">
    <div class="col-auto">
        <div class="list-inline" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="" role="tab"
               aria-controls="home">Таблицы</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="http://practice/admin/product" role="tab"
               aria-controls="profile">Product</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="http://practice/admin/images" role="tab"
               aria-controls="messages">Images</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="http://practice/admin/orders" role="tab"
               aria-controls="settings">Orders</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="http://practice/admin/client" role="tab"
               aria-controls="settings">Client</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="http://practice/admin/comments" role="tab"
               aria-controls="settings">Comments</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="http://practice/admin/vendor" role="tab"
               aria-controls="settings">Vendor</a>
        </div>
    </div>
    <?php
    include 'View/Admin/' . $view . '.php';
    ?>
</div>
</body>
</html>
