<?php

    require_once __DIR__ . '\vendor\autoload.php';

    $obj = new practice\Router\Router();
    $obj->Routing($_SERVER['REQUEST_URI']);

