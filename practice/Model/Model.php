<?php

namespace practice\Model;

use practice\Model\ActiveRecord\Orders;
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
    public static function addSpaceToPriceProduct($data_select, $name_column)
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

    public static function getData($status, $id_product)
    {
        $data_product = self::getProducts($id_product);

        $data_image = self::getImage($id_product);

        $data_order = self::getOrder($id_product, $_SESSION['user_id'], $status);

        $total_price = $data_order->getPrice() * $data_order->getAmount();

        $total_price = array([
            'total_price' => $total_price
        ]);

        $total_price = self::addSpaceToPriceProduct($total_price, 'total_price');

        return $DBdata = [
            'product' => $data_product,
            'image' => $data_image,
            'order' => $data_order,
            'total_price' => $total_price[0]['total_price']
        ];
    }

    private static function getProducts($id)
    {
        $product = new Product();
        $product->setId($id);
        return $data_product = $product->selectProduct();
    }

    private static function getImage($id)
    {
        $images = new Images();
        $images->setProductId($id);
        return $data_images = $images->selectImageForProduct();
    }

    private static function getOrder($id_product, $id_client, $status)
    {
        $order = new Orders();
        $order->setProductId($id_product);
        $order->setClientId($id_client);
        $order->setStatus($status);
        return $data_order = $order->selectPriceAndAmount();
    }
}
