<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 25.01.2019
 * Time: 15:27
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Orders;
use practice\Model\ActiveRecord\Product;
use practice\Model\Redirect;

class ControllerCart extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();

        $data_products = $this->getProductsCatalog();

        $array_id_products = $this->getArrayIdProducts($data_products);

        $data_name_products = $this->getNameProducts($array_id_products);

        $data_images = $this->getImageProduct($array_id_products);

        $DBdata = [
            'products' => $data_products,
            'name_products' => $data_name_products,
            'image' => $data_images
        ];

        $this->objectView->generate('cart', $DBdata);
    }

    protected function getProductsCatalog()
    {
        session_start();
        $orders = new Orders();
        $orders->setStatus('cart');
        $orders->setClientId($_SESSION['user_id']);
        return $data_products = $orders->selectProducts();
    }

    public function getTotalPriceProducts()
    {
        session_start();

        $orders = new Orders();
        $orders->setStatus('cart');
        $orders->setClientId($_SESSION['user_id']);
        $orders->getTotalPriceProducts();
    }

    public function checkProductInCart()
    {
        session_start();
        $message = [
            'message' => '',
            'icon' => ''
        ];

        $orders = new Orders();
        $orders->setStatus('cart');
        $orders->setClientId($_SESSION['user_id']);
        if (!$orders->selectProducts()) {
            $message['message'] = 'В корзине нет товаров!';
            $message['icon'] = 'error';
        }

        echo json_encode($message);
    }

    public function addingProductsInCart()
    {
        session_start();
        $orders = new Orders();
        $orders->setProductId($_POST['IDProduct']);
        $orders->setStatus('cart');
        $orders->setClientId($_SESSION['user_id']);
        $orders->setCreateAt('\'' . date("Y-m-d H:i:s") . '\'');

        $orders->addingProductInCart();
    }

    public function removeProductForCart()
    {
        session_start();

        $orders = new Orders();
        $orders->setProductId($_POST['IDProduct']);
        $orders->setAmount($_POST['Amount']);
        $orders->setClientId($_SESSION['user_id']);
        $orders->setUpdateAt('\'' . date("Y-m-d H:i:s") . '\'');

        $_SESSION['count_product_in_cart'] -= 1;

        $orders->deleteOne();

        echo $this->checkArrayProductsInSession();
    }

    private function checkArrayProductsInSession()
    {
        $line_info = "no_empty";
        if ($_SESSION['count_product_in_cart'] == 0) {
            $line_info = 'empty';
        }
        return $line_info;
    }

    public function countTotalPriceProduct()
    {
        session_start();
        $product = new Product();
        $product->setId($_POST['IDProduct']);
        $amount_product = $product->selectAmountProduct();

        $orders = new Orders();
        $orders->setProductId($_POST['IDProduct']);
        $orders->setClientId($_SESSION['user_id']);
        $orders->setUpdateAt('\'' . date("Y-m-d H:i:s") . '\'');
        $orders->countTotalPriceProductAndChangeAmountInDataBase($amount_product);
    }

    public function cleanCart()
    {
        session_start();
        $orders = new Orders();
        $orders->setClientId($_SESSION['user_id']);
        $orders->setStatus('cart');

        $_SESSION['count_product_in_cart'] = 0;

        $orders->deleteAll();

        Redirect::redirect('catalog');
    }
}
