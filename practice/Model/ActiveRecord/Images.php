<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 24.01.2019
 * Time: 08:20
 */

namespace practice\Model\ActiveRecord;

use practice\Model\Model;
use practice\Model\ConnectionManager;

class Images extends Model
{
    private $img;
    private $product_id;
    
    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img): void
    {
        $this->img = $img;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return array
     */
    public function selectAll()
    {
        $sql = "SELECT i.img FROM images i 
                    JOIN images_in_product ip ON i.id = ip.images_id 
                    JOIN product p ON p.id = ip.product_id 
                WHERE p.id = ".$this->product_id;

        $info_images = ConnectionManager::executionQuery($sql);

        $imagesList = array();

        for ($i = 0; $i < count($info_images); $i++) {
            $objImages = new Images();
            $objImages->setImg($info_images[$i]['img']);
            $imagesList[$i] = $objImages;
        }

        return $imagesList;
    }

    public function selectAllImageForProduct($array_id_products)
    {
        $info_images = array();
        for ($i = 0; $i < count($array_id_products); $i++) {
            $sql = "SELECT img FROM images i 
                        JOIN images_in_product ip ON ip.images_id = i.id
                        JOIN product p ON ip.product_id = p.id
                    WHERE ip.product_id = $array_id_products[$i] LIMIT 1";
            $data_image = ConnectionManager::executionQuery($sql);
            array_push($info_images, $data_image[0]['img']);
        }

        $img = array();

        for ($i = 0; $i < count($info_images); $i++) {
            $objImages = new Images();
            $objImages->setImg($info_images[$i]);
            $img[$i] = $objImages;
        }

        return $img;
    }

    public function selectImageForProduct()
    {
        $sql = "SELECT img FROM images i 
                        JOIN images_in_product ip ON ip.images_id = i.id
                        JOIN product p ON ip.product_id = p.id
                    WHERE ip.product_id = {$this->getProductId()} LIMIT 1";
        $data_image = ConnectionManager::executionQuery($sql);
        $objImages = new Images();
        $objImages->setImg($data_image[0]['img']);
        return $objImages;
    }
}
