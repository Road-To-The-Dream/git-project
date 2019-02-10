<?php

namespace practice\Controller;

use practice\Model\ActiveRecord\Images;
use practice\Model\ActiveRecord\Product;

class Controller
{
    /**
     * @return string
     */
    protected function checkSessionAndStart()
    {
        session_start();
        if (isset($_SESSION['isAuth']) && $_SESSION['ua'] == $_SERVER['HTTP_USER_AGENT'] && $_SESSION['ip'] = $_SERVER['REMOTE_ADDR']) {
            include "View\Template\header_logout.php";
        } else {
            include "View\Template\header_login.php";
        }
    }

    /**
     * @param $array_id_products
     * @return array
     */
    protected function getNameProducts($array_id_products)
    {
        $products = new Product();
        return $data_name_products = $products->selectName($array_id_products);
    }

    /**
     * @param $id_products
     * @return array
     */
    protected function getImageProduct($id_products)
    {
        $image = new Images();
        return $data_image = $image->selectAllImageForProduct($id_products);
    }

    /**
     * @param $data_products
     * @return array
     */
    protected function getArrayIdProducts($data_products)
    {
        $id_products = array();
        for ($i = 0; $i < count($data_products); $i++) {
            array_push($id_products, $data_products[$i]->getProductId());
        }

        return $id_products;
    }

    /**
     * @param $id
     * @return array
     */
    protected function getProducts($id)
    {
        $product = new Product();
        $product->setId($id);
        return $data_product = $product->selectProduct();
    }

    /**
     * @param $id
     * @return Images
     */
    protected function getImage($id)
    {
        $images = new Images();
        $images->setProductId($id);
        return $data_images = $images->selectImageForProduct();
    }
}
