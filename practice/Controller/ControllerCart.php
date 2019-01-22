<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 10:03
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Cart;

class ControllerCart extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();

        $cart = new Cart();
        $DBdata = $cart->select($_SESSION['product_id']);
        $this->objectView->generate('cart', $DBdata);
    }

    public function checkProductInCart()
    {
        $this->index();
        //echo $this->checkSessionAndStart();
//            if(!empty($_SESSION['product_id'])) {
//
//                //$this->index();
//            } else {
//                $message[0] = 'No';
//                $message[1] = 'error';
//            }
//           echo json_encode($message);
    }

    public function addingProductsInCart()
    {
        $cart = new Cart();
        $cart->checkExistArrayProductsAndAddingProductsInCart();
    }

    public function countTotalPriceProduct()
    {
        $cart = new Cart();
        $cart->countTotalPriceProduct();
    }

    public function getTotalPriceProducts()
    {
        session_start();
        $cart = new Cart();
        $cart->getTotalPriceProducts($_SESSION['product_id']);
    }

    public function removeProductForCart()
    {
        $cart = new Cart();
        $cart->delete($_POST['IDProduct']);
    }
}
