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
    public $name;
    public $create_at;
    public $update_at;

    public function __construct()
    {
        $this->connectionDB();
    }

    public function select()
    {
        $sql = "SELECT name FROM vendor";
        return ConnectionManager::executionQuery($sql);
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
