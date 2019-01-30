<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 27.01.2019
 * Time: 14:51
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Orders;
use practice\Model\Model;

class ControllerSuccess extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();

        $order = new Orders();
        $order->setClientId($_SESSION['user_id']);
        $id_order = $order->selectIdOrder();
        $order->setId($id_order);
        $id_product = $order->selectIdProductForOrder();

        $DBdata = Model::getData('done', $id_product->getProductId());

        $this->objectView->generate('success', $DBdata);
    }
}
