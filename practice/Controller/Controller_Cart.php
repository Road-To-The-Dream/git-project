<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 10:03
 */

namespace practice\Controller;


class Controller_Cart extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();

        $cart = new \practice\Model\Cart();
        $DBdata = $cart->select($_SESSION['product_id']);
        $this->objectView->generate('cart', $DBdata);
    }

    public function CheckProductInCart()
    {
        $message = array("", "");

        $this->checkSessionAndStart();
        if(!empty($_SESSION['product_id'])) {
            $message[0] = 'Yes';
            $message[1] = 'success';
        } else {
            $message[0] = 'No';
            $message[1] = 'error';
        }

        echo json_encode($message);
    }

    public function AddingProductsInCart()
    {
        $cart = new \practice\Model\Cart();
        $cart->CheckExistArrayProductsAndAddingProductsInCart();
    }

    public function CountTotalPriceProduct()
    {
        $cart = new \practice\Model\Cart();
        $cart->CountTotalPriceProduct();
    }

    public function GetTotalPriceProducts()
    {
        session_start();
        $cart = new \practice\Model\Cart();
        $cart->GetTotalPriceProducts($_SESSION['product_id']);
    }

    public function RemoveProductForCart()
    {
        $cart = new \practice\Model\Cart();
        $cart->delete($_POST['IDProduct']);
    }
}