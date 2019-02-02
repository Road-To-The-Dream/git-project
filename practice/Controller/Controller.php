<?php

namespace practice\Controller;

use practice\Model\ActiveRecord\Images;
use practice\Model\ActiveRecord\Product;

class Controller
{
    public $objectView;

    public function __construct()
    {
        $this->objectView = new View();
    }

    /**
     * @return string
     */
    protected function checkSessionAndStart()
    {
        session_start();
        if (isset($_SESSION['isAuth'])) {
            include "View\Template\header_logout.php";
        } else {
            session_destroy();
            include "View\Template\header_login.php";
        }
    }

    protected function getNameProducts($array_id_products)
    {
        $products = new Product();
        return $data_name_products = $products->selectName($array_id_products);
    }

    protected function getImageProduct($id_products)
    {
        $image = new Images();
        return $data_image = $image->selectAllImageForProduct($id_products);
    }

    protected function getArrayIdProducts($data_products)
    {
        $id_products = array();
        for ($i = 0; $i < count($data_products); $i++) {
            array_push($id_products, $data_products[$i]->getProductId());
        }

        return $id_products;
    }

    protected function getProducts($id)
    {
        $product = new Product();
        $product->setId($id);
        return $data_product = $product->selectProduct();
    }

    protected function getImage($id)
    {
        $images = new Images();
        $images->setProductId($id);
        return $data_images = $images->selectImageForProduct();
    }
}
