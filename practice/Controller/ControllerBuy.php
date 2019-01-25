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

class ControllerBuy extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();

        $product = new Product();
        $product->setId($_POST['IDProduct']);

        $data_product = $product->selectProduct();

        $data_client = $this->checkExistSessionAndSelectInfoClient();

        $DBdata = [
            'product' => $data_product,
            'client' => $data_client,
            'amount' => $_POST['amount'],
            'total_price' => $_POST['price_product']
        ];

        $this->objectView->generate('buy', $DBdata);
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
}
