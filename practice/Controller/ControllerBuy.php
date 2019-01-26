<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 20.01.2019
 * Time: 08:52
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Client;
use practice\Model\ActiveRecord\Product;
use practice\Model\ActiveRecord\Images;
use practice\Model\Model;

class ControllerBuy extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();

        $data_product = $this->getProducts($_POST['IDProduct']);

        $data_image = $this->getImage($_POST['IDProduct']);

        $data_client = $this->checkExistSessionAndSelectInfoClient();

        $price_product = array(
          0 => [
              'price' => $_POST['price_product']
          ]
        );

        $model = new Model();
        $price_product = $model->addSpaceToPriceProduct($price_product, 'price');

        $DBdata = [
            'product' => $data_product,
            'client' => $data_client,
            'image' => $data_image,
            'amount' => $_POST['amount'],
            'total_price' => $price_product[0]['price']
        ];

        $this->objectView->generate('buy', $DBdata);
    }

    private function getProducts($id)
    {
        $product = new Product();
        $product->setId($id);
        return $data_product = $product->selectProduct();
    }

    private function getImage($id)
    {
        $images = new Images();
        $images->setProductId($id);
        return $data_images = $images->selectImageForProduct();
    }

    private function checkExistSessionAndSelectInfoClient()
    {
        if (isset($_SESSION['user_id'])) {
            $objClient = new Client();
            $objClient->setId($_SESSION['user_id']);
            return $objClient->selectClient();
        }

//        $data[0]['amount'] = $_POST['amount'];
//        $data[0]['total_price'] = $_POST['amount'] * $data[0]['price'];
//
//        return $data;
    }

    public function validateBuy()
    {
        $objBuyValidation = new \practice\Model\BuyValidation();
        echo $objBuyValidation->checkBuy();
    }
}
