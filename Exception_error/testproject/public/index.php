<?php

    require __DIR__ . '/../vendor/autoload.php';

    use App\Helper\CalcHelper;
    use App\Helper\PhysicsHelper;

    $physics = new PhysicsHelper(new CalcHelper());
    $a = $argv[1];
//    $b = $argv[2];
//
//    echo 'Result fot multiply '. $a . ' by '. $b . ': '. $calculator->multiplay($a, $b);
//
//    try {
//        echo 'Result fot division '. $a . ' by '. $b . ': '. $calculator->division($a, $b);
//    } catch (\InvalidArgumentException $exception) {
//        echo 'Cannot devide by zero';
//    }

    echo 'Light will travel'.$physics->getLightPath($a);

