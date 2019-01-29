<?php

namespace practice\Controller;

use practice\Model\Redirect;

class View
{
    public function generate($content_view, $view = 'client', $data = null)
    {
        if (file_exists('View/' . $content_view . '.php')) {
            require_once 'View/' . $content_view . '.php';
        } else {
            Redirect::redirect('404');
        }
    }
}
