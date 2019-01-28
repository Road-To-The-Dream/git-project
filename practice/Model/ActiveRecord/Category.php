<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.01.2019
 * Time: 15:03
 */

namespace practice\Model\ActiveRecord;

use practice\Model\ConnectionManager;

class Category
{
    private $id;
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    public function selectName()
    {
        $sql = "SELECT name FROM categories WHERE id = " . $this->getId();
        $name_category = ConnectionManager::executionQuery($sql);

        $objCategory = new Category();
        $objCategory->setName($name_category[0]['name']);

        $CategoryList = array();
        $CategoryList[0] = $objCategory;

        return $CategoryList;
    }
}
