<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 10:03
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Orders;
use practice\Model\ActiveRecord\Product;

class ControllerOrders extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();

        $data_products = $this->getProducts();

        $array_id_products = $this->getArrayIdProducts($data_products);

        $data_name_products = $this->getNameProducts($array_id_products);

        $data_images = $this->getImageProduct($array_id_products);

        $DBdata = [
            'products' => $data_products,
            'name_products' => $data_name_products,
            'image' => $data_images
        ];

        $this->objectView->generate('orders', $DBdata);
    }

    protected function getProducts()
    {
        session_start();
        $orders = new Orders();
        $orders->setStatus('done');
        $orders->setClientId($_SESSION['user_id']);
        return $data_products = $orders->selectProducts();
    }

    public function checkProductInOrders()
    {
        session_start();
        $message = [
            'message' => '',
            'icon' => ''
        ];

        $orders = new Orders();
        $orders->setStatus('done');
        $orders->setClientId($_SESSION['user_id']);
        if (!$orders->selectProducts()) {
            $message['message'] = 'У вас ещё нет заказов!';
            $message['icon'] = 'error';
        }

        echo json_encode($message);
    }

    public function addOrder()
    {
        session_start();

        $_SESSION['count_product_in_cart'] += 1;

        if (isset($_SESSION['isAuth'])) {
            $orders = new Orders();
            $orders->setProductId($_POST['IDProduct']);
            $orders->setAmount($_POST['amount'.$_POST['IDProduct']]);
            $orders->setClientId($_SESSION['user_id']);
            $orders->setCreateAt('\'' . date("Y-m-d H:i:s") . '\'');
            $orders->insert();

            $buy = new ControllerBuy();
            $buy->index();
        }

        if ($_POST['amount'] == 1) {
            $product = new Product();
            $product->setId($_POST['IDProduct']);
            $product->setAmount($_POST['amount']);
            $product->setUpdateAt('\'' . date("Y-m-d H:i:s") . '\'');
            $product->updateDecreaseAmount();
        }
    }

    public function modalButtonBuy()
    {
        $product = new Product();
        $product->updateDecreaseAmount();
    }

    public function modalButtonClose()
    {
        $product = new Product();
        $product->setAmount($_POST['amount']);
        $product->updateIncreaseAmount();
    }
}
