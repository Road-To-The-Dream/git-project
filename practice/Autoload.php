<?php

    function myAutoload($className)
    {
        require_once __DIR__.'\\'.$className.'.php';
    }

    spl_autoload_register('myAutoload', true);