<?php

        function myAutoload($className)
        {
            switch ($className)
            {
                case 'Model':
                    require_once 'Model/'.$className.'.php';
                    break;
                case 'Controller':
                    require_once 'Controller/'.$className.'.php';
                    break;
                case 'View':
                    require_once 'Controller/'.$className.'.php';
                    break;
            }
        }

        spl_autoload_register('myAutoload', true);