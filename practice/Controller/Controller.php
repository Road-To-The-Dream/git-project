<?php

namespace practice\Controller;

class Controller
{
    public $objectView;

    public function __construct()
    {
        $this->objectView = new View();
    }

    /**
     * @return string
     */
    protected function checkSessionAndStart()
    {
        session_start();
        if (isset($_SESSION['isAuth'])) {
            if (!isset($_SESSION['product_id'])) {
                $_SESSION['product_id'] = [];
            }
            include "View\Template\header_logout.php";
        } else {
            session_destroy();
            include "View\Template\header_login.php";
        }
    }
}
