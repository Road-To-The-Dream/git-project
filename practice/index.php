<?php

require_once __DIR__ . '\vendor\autoload.php';
require_once __DIR__ . '\LOGS\logs.php';

$obj = new practice\Router\Router();
$obj->routing($_SERVER['REQUEST_URI']);
