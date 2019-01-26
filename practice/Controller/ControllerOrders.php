<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 10:03
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Orders;

class ControllerOrders extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();

        $orders = new Orders();
        $DBdata = $orders->selectProductForOrders();
        $this->objectView->generate('orders', $DBdata);
    }
}
