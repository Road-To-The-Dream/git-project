<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 20.01.2019
 * Time: 08:52
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Product;

class ControllerBuy extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();
        $this->objectView->generate('buy');
    }

    public function showBuy()
    {
        $this->checkSessionAndStart();

        //            $order = new \practice\Model\Order();
        //            $order->insert();

        $product = new Product();
        $product->id_product = $_POST['IDProduct'];
        $DBdata = $product->checkExistSessionAndSelectProduct($_SESSION['user_id']);

        $this->objectView->generate('buy', $DBdata);
    }
}