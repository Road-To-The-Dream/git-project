<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 23.01.2019
 * Time: 18:23
 */

namespace practice\Model\ActiveRecord;

use practice\Model\Model;
use practice\Model\ConnectionManager;

class Vendor extends Model
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

    public function __construct()
    {
        $this->connectionDB();
    }

    public static function selectAll()
    {
        ConnectionManager::getInstance();

        $sql = "SELECT id, name FROM vendor";
        $info_vendors = ConnectionManager::executionQuery($sql);

        for ($i = 0; $i < count($info_vendors); $i++) {
            $objVendor = new Vendor();
            $objVendor->setId($info_vendors[$i]['id']);
            $objVendor->setName($info_vendors[$i]['name']);
            $vendor[$i] = $objVendor;
        }

        return $vendor;
    }

    public function selectNameById()
    {
        $sql = "SELECT name FROM vendor WHERE id = " . $this->getId();
        $name_vendor = ConnectionManager::executionQuery($sql);

        $objVendor = new Vendor();
        $objVendor->setName($name_vendor[0]['name']);

        return $objVendor;
    }

    public function insert()
    {
        $sql = "INSERT INTO vendor (name, create_at) 
                VALUES (:name, {$this->getCreateAt()})";
        $parameters = array(
            ':name' => $this->getName()
        );
        return ConnectionManager::executionQuery($sql, $parameters);
    }

    /**
     * @return null
     */
    public function update()
    {
        $sql = "UPDATE vendor SET name = " . '\'' . $this->getName() . '\'' . ", update_at = " . $this->getUpdateAt() . " WHERE id = " . '\'' . $this->getId() . '\'';
        return ConnectionManager::executionQuery($sql);
    }

    /**
     * @return null
     */
    public function delete()
    {
        $sql = "DELETE FROM vendor WHERE id = " . $this->getId();
        return ConnectionManager::executionQuery($sql);
    }
}
