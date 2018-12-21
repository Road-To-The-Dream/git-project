<?php

    require_once 'Autoload.php';
    require_once 'Router/index.php';

    $obj = new Route();
    $obj->Routing($_SERVER['REQUEST_URI']);

    //show_product
    //show_all
    //show_login

