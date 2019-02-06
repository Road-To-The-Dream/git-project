<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.02.2019
 * Time: 10:02
 */

namespace practice\Model\ActiveRecord;

use practice\Model\ConnectionManager;

class CharacteristicChild
{
    private $id;
    private $name;
    private $characteristic_parent_id;

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

    /**
     * @return mixed
     */
    public function getCharacteristicParentId()
    {
        return $this->characteristic_parent_id;
    }

    /**
     * @param mixed $characteristic_parent_id
     */
    public function setCharacteristicParentId($characteristic_parent_id): void
    {
        $this->characteristic_parent_id = $characteristic_parent_id;
    }

    public function selectName($count_parent)
    {
        $ChildList = array();
        for ($characteristicParent = 1; $characteristicParent <= $count_parent; $characteristicParent++) {
            $sql = "SELECT name FROM characteristic_child WHERE characteristic_parent_id = " . $characteristicParent;
            $name_child = ConnectionManager::executionQuery($sql);

            for ($characteristicChild = 0; $characteristicChild < count($name_child); $characteristicChild++) {
                $objChild = new CharacteristicChild();
                $objChild->setName($name_child[$characteristicChild]['name']);
                $ChildList[$characteristicParent][$characteristicChild] = $objChild;
            }
        }

        return $ChildList;
    }
}
