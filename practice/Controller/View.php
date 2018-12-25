<?php

    namespace practice\Controller;

    class View
    {
        function generate($content_view, $data = null)
        {
            //session_start();
            if(file_exists('View/'.$content_view))
                require_once 'View/'.$content_view;
            else
                header('Location: http://practice/404/show_404');
        }
    }