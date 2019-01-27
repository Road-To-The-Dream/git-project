<?php

function myAutoload($className)
{
    //$className = 'Hel_lo\wo_rld\Sergey_SUshko';

    $pieces_class = explode('\\', $className);
//        Hel_lo
//        wo_rld
//        Sergey_SUshko

    $last_pieces = $pieces_class[count($pieces_class) - 1];
    //Sergey_SUshko

    $arr_replacement = array('-', '_');
    $replacement = str_replace($arr_replacement, '\\', $last_pieces);
    //Sergey\SUshko

    $pieces_class[count($pieces_class) - 1] = $replacement;
    //Hel_lo\wo_rld\Sergey\SUshko

    $pieces_class2 = explode('\\', implode(DIRECTORY_SEPARATOR, $pieces_class));
//        Hel_lo
//        wo_rld
//        Sergey
//        SUshko

    $pieces_class2[count($pieces_class2) - 1] = ucwords(strtolower($pieces_class2[count($pieces_class2) - 1]));
//        Hel_lo
//        wo_rld
//        Sergey
//        Sushko

    // echo __DIR__.'\\'.implode(DIRECTORY_SEPARATOR, $pieces_class2).'.php';
    //C:\OSPanel\domains\practice\Sergey\Sushko.php
    require_once __DIR__ . '\\' . implode(DIRECTORY_SEPARATOR, $pieces_class) . '.php';
}

spl_autoload_register('myAutoload', true);