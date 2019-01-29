<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.01.2019
 * Time: 11:04
 */

namespace practice\Controller;

class ControllerAdmin extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();
        $this->objectView->generate('administrator');
    }
}
