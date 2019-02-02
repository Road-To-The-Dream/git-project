<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.02.2019
 * Time: 10:03
 */

namespace practice\Model\ActiveRecord;

use practice\Model\ConnectionManager;

class CharacteristicValue
{
    private $id;
    private $value;
    private $unit;
    private $characteristic_child_id;
    private $product_id;

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
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value): void
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param mixed $unit
     */
    public function setUnit($unit): void
    {
        $this->unit = $unit;
    }

    /**
     * @return mixed
     */
    public function getCharacteristicChildId()
    {
        return $this->characteristic_child_id;
    }

    /**
     * @param mixed $characteristic_child_id
     */
    public function setCharacteristicChildId($characteristic_child_id): void
    {
        $this->characteristic_child_id = $characteristic_child_id;
    }

    /**
     * @return mixed
     */
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

    public function selectName($count_parent)
    {
        $ValueList = array();
        for ($i = 1; $i <= $count_parent; $i++) {
            $sql = "SELECT cv.value, cv.unit FROM characteristic_value cv JOIN product p ON cv.product_id = p.id 
                    JOIN characteristic_child ch ON cv.characteristic_child_id = ch.id 
                    JOIN characteristic_parent cp ON ch.characteristic_parent_id = cp.id
                    WHERE cp.id = " . $i . " AND cv.product_id = " . $this->getProductId();
            $name_child = ConnectionManager::executionQuery($sql);

            for ($j = 0; $j < count($name_child); $j++) {
                $objValue = new CharacteristicValue();
                $objValue->setValue($name_child[$j]['value']);
                $objValue->setUnit($name_child[$j]['unit']);
                $ValueList[$i][$j] = $objValue;
            }
        }

        return $ValueList;
    }
}
