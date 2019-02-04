<?php

namespace practice\Controller;

use practice\Model\Redirect;

class View
{
    public function generate($content_view, $data = null, $view = 'client')
    {
        if (file_exists('View/' . $content_view . '.php')) {
            require_once 'View/' . $content_view . '.php';
            return true;
        } else {
            Redirect::redirect('404');
            return false;
        }
    }
}
