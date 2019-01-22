<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 18.01.2019
 * Time: 08:00
 */

namespace practice\Model\ActiveRecord;

use practice\Model\Model;
use practice\Model\ConnectionManager;


class Order extends Model
{
    private $status;
    private $price;
    private $amount;
    private $create_at;
    private $update_at;

    public function __construct()
    {
        $this->connectionDB();
    }

    public function select(){}

    public function insert()
    {
        //$sql = ;
    }

    public function update(){}

    public function delete(){}
}
