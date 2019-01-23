<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.01.2019
 * Time: 16:49
 */

namespace practice\Model\ActiveRecord;

use practice\Model\Model;
use practice\Model\ConnectionManager;

class Cart extends Model
{
    private $message_about_adding_product = array("", "", "");

    public function __construct()
    {
        $this->connectionDB();
    }

    /**
     * @param $price
     * @return mixed
     */
    private function removeSpacesInPrice($price)
    {
        return str_replace(' ', '', $price);
    }

    /**
     * @param $array_products
     */
    public function getTotalPriceProducts($array_products)
    {
        $DBdata = $this->selectTotalPriceProducts($array_products);
        $total_price_products = $this->addSpaceToPriceProduct($DBdata, 'total_price');
        $total_price_products = $total_price_products[0]['total_price'];
        echo $total_price_products;
    }

    /**
     * @param $array_products
     * @return mixed|null|string
     */
    public function select($array_products)
    {
        $amount_products = count($array_products);
        if ($amount_products > 1) {
            $query = "Select id, name, price, unit, (SELECT img FROM images i 
                                                      JOIN images_in_product ip ON ip.images_id = i.id 
                                                     WHERE ip.product_id = p.id LIMIT 1) as image
                      From product p 
                      Where id IN (".implode(",", $array_products).")";
        } elseif ($amount_products == 1) {
            $query = "Select id, name, price, unit, (SELECT img FROM images i 
                                                      JOIN images_in_product ip ON ip.images_id = i.id 
                                                     WHERE ip.product_id = p.id LIMIT 1) as image 
                      From product p 
                      Where id = ".array_shift($array_products);
        } else {
            return "";
        }
        $DBdata = ConnectionManager::executionQuery($query);
        $DBdata = $this->addSpaceToPriceProduct($DBdata, 'price');

        return $DBdata;
    }

    public function insert(){}

    public function update(){}

    /**
     * @param $id
     * @return string
     */
    public function delete($id)
    {
        session_start();
        if (($key = array_search($id, $_SESSION['product_id'])) !== false) {
            unset($_SESSION['product_id'][$key]);
        }

        return $this->checkArrayProductsInSession();
    }

    /**
     * @return string
     */
    private function checkArrayProductsInSession()
    {
        $line_info = "no_empty";
        if (empty($_SESSION['product_id'])) {
            $line_info = 'empty';
        }

        return $line_info;
    }

    /**
     * @param $array_products
     * @return null
     */
    private function selectTotalPriceProducts($array_products)
    {
        $query = "Select SUM(price) AS total_price FROM product where id IN(".implode(",", $array_products).")";
        $d = ConnectionManager::executionQuery($query);
        return $d;
    }

    private function checkExistProductInCartAndAdding()
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

    public function checkExistArrayProductsAndAddingProductsInCart()
    {
        session_start();
        if (isset($_SESSION['product_id'])) {
            $this->checkExistProductInCartAndAdding();
        } else {
            session_destroy();
            $this->message_about_adding_product[0] = "Для добавления товара в корзину требуется войти в аккаунт!";
            $this->message_about_adding_product[1] = "error";
        }

        echo json_encode($this->message_about_adding_product);
    }

    public function countTotalPriceProduct()
    {
        $price = array("", "", "");

        $amount_units = $_POST['amount_units'];
        $price_product = $this->removeSpacesInPrice($_POST['price_product']);
        $total_price_product = $this->removeSpacesInPrice($_POST['total_price_product']);
        $price_all_products = $this->removeSpacesInPrice($_POST['price_all_products']);

        if ($_POST['btn_value'] == '+') {
            $amount_units++;
            $price_all_products += $price_product;
            $total_price_product = $amount_units * $price_product;
        } else {
            if ($amount_units > 1) {
                $amount_units--;
                $total_price_product = $amount_units * $price_product;
                $price_all_products -= $price_product;
            }
        }
        $price[0] = $amount_units;
        $price[1] = $total_price_product;
        $price[2] = $price_all_products;

        echo json_encode($price);
    }
}
