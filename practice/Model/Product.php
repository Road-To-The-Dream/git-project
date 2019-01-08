<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 08.01.2019
 * Time: 14:43
 */

namespace practice\Model;

class Product
{
    private $config = [];
    private $db;

    public $id = 0;

    public function __construct()
    {
        $this->config = require 'DBconfiguration.php';
        $this->db = new ConnectionManager($this->config);
    }

    public function select($sorting = 0)
    {
        if($this->id == 0) {
            if($sorting == 1) {
                return $this->db->ExecutionQuery('SELECT * FROM products ORDER BY price DESC');
            }
            else if($sorting == 2) {
                return $this->db->ExecutionQuery('SELECT * FROM products ORDER BY price ASC');
            }
            return $this->db->ExecutionQuery("SELECT * FROM products");
        }
        else {
            return $this->db->ExecutionQuery("SELECT * FROM products WHERE id = ".$this->id);
        }
    }

    public function insert()
    {
        $this->db->ExecutionQuery("INSERT INTO products(name,image,price,unit) VALUES ('qwe','Image',12.999,'грн')");
    }

    public function update(){}

    public function delete(){}
}