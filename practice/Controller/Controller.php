<?php

namespace practice\Controller;

use practice\Model\ActiveRecord\Product;

class Controller
{
    public $objectView;

    public function __construct()
    {
        $this->objectView = new View();
    }

    public function correct()
    {
        $arr = array('Acer', 'Apple', 'Lenovo', 'Prestigio');
        echo json_encode($arr);
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

            $arr = array('Acer', 'Apple', 'Lenovo', 'Prestigio');
            return json_encode($arr);
        } else {
            session_destroy();
            include "View\Template\header_login.php";
        }
    }
}
