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
    private $create_at;

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
}