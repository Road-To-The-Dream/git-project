<?php

namespace practice\Model;

use practice\Model\ActiveRecord\Client;
use practice\Model\ActiveRecord\Product;
use practice\Model\ActiveRecord\Images;

class Model
{
    protected $create_at;
    protected $update_at;

    /**
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * @param mixed $create_at
     */
    public function setCreateAt($create_at): void
    {
        $this->create_at = $create_at;
    }

    /**
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->update_at;
    }

    /**
     * @param mixed $update_at
     */
    public function setUpdateAt($update_at): void
    {
        $this->update_at = $update_at;
    }

    protected function connectionDB()
    {
        ConnectionManager::getInstance();
    }

    /**
     * @param $data_select
     * @param $name_column
     * @return mixed
     */
    public function addSpaceToPriceProduct($data_select, $name_column)
    {
        for ($i = 0; $i < count($data_select); $i++) {
            switch (strlen($data_select[$i][$name_column])) {
                case 4:
                    $data_select[$i][$name_column] = substr($data_select[$i][$name_column], 0, 1) . " " . substr($data_select[$i][$name_column], 1);
                    break;
                case 5:
                    $data_select[$i][$name_column] = substr($data_select[$i][$name_column], 0, 2) . " " . substr($data_select[$i][$name_column], 2);
                    break;
                case 6:
                    $data_select[$i][$name_column] = substr($data_select[$i][$name_column], 0, 3) . " " . substr($data_select[$i][$name_column], 3);
                    break;
            }
        }

        return $data_select;
    }

    public function getData()
    {
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

        return $DBdata = [
            'product' => $data_product,
            'client' => $data_client,
            'image' => $data_image,
            'amount' => $_POST['amount'],
            'total_price' => $price_product[0]['price']
        ];
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
}
