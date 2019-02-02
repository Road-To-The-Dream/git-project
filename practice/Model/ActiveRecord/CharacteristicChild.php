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
        for ($i = 1; $i <= $count_parent; $i++) {
            $sql = "SELECT name FROM characteristic_child WHERE characteristic_parent_id = " . $i;
            $name_child = ConnectionManager::executionQuery($sql);

            for ($j = 0; $j < count($name_child); $j++) {
                $objChild = new CharacteristicChild();
                $objChild->setName($name_child[$j]['name']);
                $ChildList[$i][$j] = $objChild;
            }
        }

        return $ChildList;
    }
}
