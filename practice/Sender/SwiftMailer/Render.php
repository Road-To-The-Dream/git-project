<?php

    require_once 'SwiftMailerTransport.php';

    class Render
    {
        public function createParameters()
        {
            $params = require_once('sendingData.php');
            return $params;
        }

        public function getParameters()
        {
            $params = $this->createParameters();

             return $params;
        }

        public function renderPhpFile()
        {
            $params = $this->getParameters();
            $path = $params['path'];

            if( file_exists('sender/'.$path))
            {
                ob_start();
                extract($params, EXTR_OVERWRITE);
                require_once $path;
                $page = ob_get_clean();
                return $page;
            }
        }
    }