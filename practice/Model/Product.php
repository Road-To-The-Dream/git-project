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
    public $id_product = 0;

    public function __construct()
    {
        $this->config = require 'DBconfiguration.php';
        $this->db = new ConnectionManager($this->config);
    }

    public function select($sorting = 0)
    {
        if($this->id_product == 0) {
            if($sorting == 1) {
                return $this->db->ExecutionQuery('SELECT * FROM prod ORDER BY price DESC');
            }
            else if($sorting == 2) {
                return $this->db->ExecutionQuery('SELECT * FROM prod ORDER BY price ASC');
            }
        }
        else {
            return $this->db->ExecutionQuery("SELECT * FROM prod WHERE id = ".$this->id_product);
        }
        return $this->db->ExecutionQuery("SELECT * FROM prod");
    }

    public function SelectProductsForCart($arr_products)
    {
        $amount = count($arr_products);
        if($amount > 1) {
            $query = "Select * From prod Where id IN (";
            $query .= "'".$arr_products[0]."'";
            for($i=1; $i < $amount; $i++)
            {
                $query .= ", '".$arr_products[$i]."'";
            }
            $query .= ")";
        }
        else{
            $query = "Select * From prod Where id = ".$arr_products[0];
        }

        return $this->db->ExecutionQuery($query);
    }

    public function insert()
    {
        $this->db->ExecutionQuery("INSERT INTO product(name,image,price,unit) VALUES ('qwe','Image',12.999,'грн')");
    }

    public function update(){}

    public function delete(){}
}