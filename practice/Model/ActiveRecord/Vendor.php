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
    private $name;

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

    public function selectAll()
    {
        $sql = "SELECT name FROM vendor";
        $info_vendors = ConnectionManager::executionQuery($sql);

        for ($i = 0; $i < count($info_vendors); $i++) {
            $objVendor = new Vendor();
            $objVendor->setName($info_vendors[$i]['name']);
            $vendor[$i] = $objVendor;
        }

        return $vendor;
    }

    public function insert()
    {
    }

    public function update()
    {
    }

    public function delete($id)
    {
    }
}
