<?php

    class Render
    {
        public function getSendingData()
        {
            $params = require_once('sendingData.php');
            return $params;
        }

        public function loadFile()
        {
            $params = $this->getSendingData();
            $path = $params['path'];

            if( file_exists($path) )
            {
                ob_start();
                extract($params, EXTR_OVERWRITE);
                require_once $path;
                $page = ob_get_clean();
                return $page;
            }
        }
    }