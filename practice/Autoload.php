<?php

    function myAutoload($className)
    {
        $class_pieces = explode('\\', $className);

        switch ($class_pieces[0]) {
            case 'Model':
                //echo '<br>'.__DIR__.'\\'.implode(DIRECTORY_SEPARATOR, $class_pieces).'.php';
                require_once __DIR__.'\\'.implode(DIRECTORY_SEPARATOR, $class_pieces).'.php';
                break;
            case 'Controller':
                //echo __DIR__.'\\'.implode(DIRECTORY_SEPARATOR, $class_pieces).'.php'.'<br>';
                require_once __DIR__.'\\'.implode(DIRECTORY_SEPARATOR, $class_pieces).'.php';
                break;
            case 'View':
                //echo '<br>'.__DIR__.'\\'.implode(DIRECTORY_SEPARATOR, $class_pieces).'.php';
                require_once __DIR__.'\\'.implode(DIRECTORY_SEPARATOR, $class_pieces).'.php';
                break;
        }
    }

    spl_autoload_register('myAutoload', true);