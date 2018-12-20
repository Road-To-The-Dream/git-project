<?php

    require_once __DIR__ . '/SwiftMailer/vendor/autoload.php';
    require_once './SwiftMailer/Sender.php';

    $ob = new Sender();
    $ob->send();
    echo 'start';





