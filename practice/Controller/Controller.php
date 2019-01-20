<?php

namespace practice\Controller;

class Controller
{
    public $objectView;

    public function __construct()
    {
        $this->objectView = new View();
    }

    public function show_all($view_name, $sorting = 0)
    {
        $this->checkSessionAndStart();

        $product = new \practice\Model\Product();
        $DBdata = $product->select($sorting);

        $this->objectView->generate($view_name, $DBdata);
    }

    public function correct()
    {
        $arr = array('Acer', 'Apple', 'Lenovo', 'Prestigio');
        echo json_encode($arr);
    }

    public function AddingOrder()
    {
        $order = new \practice\Model\Order();
        $order->insert();
    }

    protected function checkSessionAndStart()
    {
        session_start();
        if(isset($_SESSION['isAuth'])) {
            if(!isset($_SESSION['product_id'])) {
                $_SESSION['product_id'] = [];
            }
            include "View\Template\header_logout.php";
        }
        else {
            session_destroy();
            include "View\Template\header_login.php";
        }
    }
}
