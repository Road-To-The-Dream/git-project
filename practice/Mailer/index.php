<?php

    require_once 'SwiftMailer/vendor/autoload.php';
    require_once 'SwiftMailer/Sender.php';

    $ob = new Sender();
    $ob->send();
