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

        if (isset($_SESSION['isAuth'])) {
            $order = new Orders();
            $order->setClientId($_SESSION['user_id']);
            $id_order = $order->selectIdOrder();
            $order->setId($id_order);
            $id_product = $order->selectIdProductForOrder();

            $DBdata = Model::getData('done', $id_product->getProductId());
        } else {
            $data_product = self::getProducts($_SESSION['IDProduct']);

            $data_image = self::getImage($_SESSION['IDProduct']);

            $price = str_replace(' ', '', $data_product[0]->getPrice());
            $total_price = $price * $_SESSION['amount'];

            $order = new Orders();
            $order->setAmount($_SESSION['amount']);
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

        View::generate('success', $DBdata);
    }
}
