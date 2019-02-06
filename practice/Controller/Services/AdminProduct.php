<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.02.2019
 * Time: 22:40
 */

namespace practice\Controller\Services;

use practice\Model\ActiveRecord\Product;
use practice\Model\Redirect;

class AdminProduct
{
    public static function getProduct()
    {
        Redirect::redirect('admin/product');
    }

    public static function addProduct()
    {
        $product = new Product();

        self::setValueProduct($product);

        $product->insert();
        self::getProduct();
    }

    public static function saveProduct()
    {
        $product = new Product();
        if (isset($_POST['checkbox'])) {
            $product->setId($_POST['id']);
            $product->delete();
        } else {
            self::setValueProduct($product);
            $product->updateProductForAdmin();
        }
        self::getProduct();
    }

    private static function setValueProduct(object $product)
    {
        $product->setId($_POST['id']);
        $product->setName($_POST['name']);
        $product->setDescription($_POST['description']);
        $product->setPrice($_POST['price']);
        $product->setUnit($_POST['unit']);
        $product->setAmount($_POST['amount']);
        $product->setCreateAt('\'' . date("Y-m-d H:i:s") . '\'');
        $product->setUpdateAt('\'' . date("Y-m-d H:i:s") . '\'');

        return true;
    }
}
