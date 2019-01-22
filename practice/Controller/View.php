<?php

namespace practice\Controller;

class View
{
    public function generate($content_view, $data = null)
    {
        if (file_exists('View/'.$content_view.'.php')) {
            require_once 'View/'.$content_view.'.php';
        } else {
            header('Location: http://practice/404');
        }
    }
}