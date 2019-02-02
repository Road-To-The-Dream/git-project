<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.02.2019
 * Time: 09:37
 */

namespace practice\Model\ActiveRecord;

use practice\Model\ConnectionManager;

class CharacteristicParent
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
        $sql = "SELECT name FROM characteristic_parent";
        $name_parent = ConnectionManager::executionQuery($sql);

        $ParentList = array();
        for ($i = 0; $i < count($name_parent); $i++) {
            $objParent = new CharacteristicParent();
            $objParent->setName($name_parent[$i]['name']);
            $ParentList[$i] = $objParent;
        }

        return $ParentList;
    }
}
