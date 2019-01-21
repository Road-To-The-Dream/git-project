<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 20.01.2019
 * Time: 08:52
 */

namespace practice\Controller;


class Controller_Buy extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();
        $this->objectView->generate('buy');
    }

    public function show_buy($view_name)
    {
        $this->checkSessionAndStart();

//            $order = new \practice\Model\Order();
//            $order->insert();

        $product = new \practice\Model\Product();
        $product->id_product = $_POST['IDProduct'];
        $DBdata = $product->CheckExistSessionAndSelectProduct($_SESSION['user_id']);

        $this->objectView->generate('buy', $DBdata);
    }
}