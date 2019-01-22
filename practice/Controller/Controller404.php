<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 11:12
 */

namespace practice\Controller;

class Controller404 extends Controller
{
    public function index()
    {
        $this->objectView->generate('404');
    }
}