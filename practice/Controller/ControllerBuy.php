<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 20.01.2019
 * Time: 08:52
 */

namespace practice\Controller;

use practice\Model\Model;
use practice\Model\BuyValidation;
use practice\Model\ActiveRecord\Orders;

class ControllerBuy extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();

        if (isset($_SESSION['isAuth'])) {
            $model = new Model();
            $DBdata = $model->getData('cart', $_POST['IDProduct']);
        } else {
            $data_product = self::getProducts($_POST['IDProduct']);

            $data_image = self::getImage($_POST['IDProduct']);

            $price = str_replace(' ', '', $data_product[0]->getPrice());
            $total_price = $price * $_POST['amount'.$_POST['IDProduct']];

            $order = new Orders();
            $order->setAmount($_POST['amount'.$_POST['IDProduct']]);
            $data_order = $order;

            $total_price = array([
                'total_price' => $total_price
            ]);

            $total_price = Model::addSpaceToPriceProduct($total_price, 'total_price');

            $DBdata = [
                'product' => $data_product,
                'image' => $data_image,
                'order' => $data_order,
                'total_price' => $total_price[0]['total_price']
            ];
        }

        View::generate('buy', $DBdata);
    }

    public function validateBuy()
    {
        if (!isset($_SESSION['isAuth'])) {
            session_start();
            $_SESSION['IDProduct'] = $_POST['IDProduct'];
            $_SESSION['amount'] = $_POST['amount'];
        }
        $objBuyValidation = new BuyValidation();
        echo $objBuyValidation->checkBuy();
    }
}
