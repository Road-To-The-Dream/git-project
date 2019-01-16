<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.01.2019
 * Time: 16:49
 */

namespace practice\Model;


class Cart extends Model
{
    private $message_about_adding_product = array("", "", "");

    private function RemoveSpacesInPrice($price)
    {
        return str_replace(' ', '', $price);
    }

    public function GetTotalPriceProducts($array_products)
    {
        $product = new Product();
        $DBdata = $product->SelectTotalPriceProducts($array_products);
        $total_price_products = $this->ChangePriceProduct($DBdata, 'total_price');
        $total_price_products = $total_price_products[0]['total_price'];
        echo $total_price_products;
    }

    public function RemoveProductInCart($id)
    {
        session_start();
        if (($key = array_search($id, $_SESSION['product_id'])) !== false) {
            unset($_SESSION['product_id'][$key]);
        }
    }

    private function CheckExistProductInCartAndAdding()
    {
        if (!in_array($_POST['IDProduct'], $_SESSION['product_id'])) {
            array_push($_SESSION['product_id'], $_POST['IDProduct']);
            $this->message_about_adding_product[0] = "Товар добавлен в корзину !";
            $this->message_about_adding_product[1] = "success";
            $this->message_about_adding_product[2] = count($_SESSION['product_id']);
        } else {
            $this->message_about_adding_product[0] = "Товар уже имеется в корзине ! Перейдите в корзину для покупки.";
            $this->message_about_adding_product[1] = "error";
        }
    }

    public function CheckExistArrayProductsAndAddingProductsInCart()
    {
        session_start();
        if(isset($_SESSION['product_id'])) {
            $this->CheckExistProductInCartAndAdding();
        } else {
            session_destroy();
            $this->message_about_adding_product[0] = "Для добавления товара в корзину требуется войти в аккаунт!";
            $this->message_about_adding_product[1] = "error";
        }

        echo json_encode($this->message_about_adding_product);
    }

    public function CountTotalPriceProduct()
    {
        $price = array("", "", "");

        $amount_units = $_POST['amount_units'];
        $price_product = $this->RemoveSpacesInPrice($_POST['price_product']);
        $total_price_product = $this->RemoveSpacesInPrice($_POST['total_price_product']);
        $price_all_products = $this->RemoveSpacesInPrice($_POST['price_all_products']);

        if($_POST['btn_value'] == '+') {
            $amount_units++;
            $price_all_products += $total_price_product;
            $total_price_product = $amount_units * $price_product;
        } else {
            if($amount_units > 1) {
                $amount_units--;
                $total_price_product = $amount_units * $price_product;
                $price_all_products -= $total_price_product;
            }
        }
        $price[0] = $amount_units;
        $price[1] = $total_price_product;
        $price[2] = $price_all_products;

        echo json_encode($price);
    }
}