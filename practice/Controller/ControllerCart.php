<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 25.01.2019
 * Time: 15:27
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Orders;
use practice\Model\ActiveRecord\Images;
use practice\Model\ActiveRecord\Product;
use practice\Model\Redirect;

class ControllerCart extends Controller
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

        $this->objectView->generate('cart', $DBdata);
    }

    private function getProducts()
    {
        session_start();
        $orders = new Orders();
        $orders->setStatus('cart');
        $orders->setClientId($_SESSION['user_id']);
        return $data_products = $orders->selectProductsForCart();
    }

    private function getNameProducts($array_id_products)
    {
        $products = new Product();
        return $data_name_products = $products->selectName($array_id_products);
    }

    private function getImageProduct($id_products)
    {
        $image = new Images();
        return $data_image = $image->selectAllImageForProduct($id_products);
    }

    private function getArrayIdProducts($data_products)
    {
        $id_products = array();
        for ($i = 0; $i < count($data_products); $i++) {
            array_push($id_products, $data_products[$i]->getProductId());
        }

        return $id_products;
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
        if (!$orders->selectProductsForCart()) {
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
        $orders->addingProductInCart();
    }

    public function removeProductForCart()
    {
        $orders = new Orders();
        $orders->setProductId($_POST['IDProduct']);
        $orders->setAmount($_POST['Amount']);
        session_start();
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
        $product = new Product();
        $product->setId($_POST['IDProduct']);
        $amount_product = $product->selectAmountProduct();

        $orders = new Orders();
        $orders->setProductId($_POST['IDProduct']);
        $orders->countTotalPriceProductAndChangeAmountInDataBase($amount_product);
    }

    public function cleanCart()
    {
        session_start();
        $orders = new Orders();
        $orders->setClientId($_SESSION['user_id']);

        $_SESSION['count_product_in_cart'] = 0;

        $orders->setStatus('cart');
        $orders->deleteAll();

        Redirect::redirect('catalog');
    }
}
