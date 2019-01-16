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
                return $this->db->ExecutionQuery('SELECT * FROM product ORDER BY price DESC');
            }
            else if($sorting == 2) {
                return $this->db->ExecutionQuery('SELECT * FROM product ORDER BY price ASC');
            }
        }
        else {
            $q = $this->db->ExecutionQuery("SELECT cl.first_name, com.content, date_added FROM comments com JOIN client cl ON cl.id = com.client_id JOIN product pr ON pr.id = com.product_id WHERE pr.id = ".$this->id_product);
            $w = $this->db->ExecutionQuery("SELECT * FROM product WHERE id = ".$this->id_product);

            $result = array_merge((array)$q, (array)$w);

            return $result;
        }
        return $this->db->ExecutionQuery("SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, (SELECT img FROM images i JOIN images_in_product ip ON ip.images_id = i.id WHERE ip.product_id = p.id LIMIT 1) as image FROM product p");
    }

    public function SelectProductsForCart($array_products)
    {
        $amount_products = count($array_products);
        if($amount_products > 1) {
            $query = "Select * From product Where id IN (".implode(",", $array_products).")";
        } else if($amount_products == 1) {
            $query = "Select * From product Where id = ".array_shift($array_products);
        } else {
            return "";
        }
        $d = $this->db->ExecutionQuery($query);

        return $d;
    }

    public function SelectTotalPriceProducts($array_products)
    {
        $query = "Select SUM(price) AS total_price FROM product where id IN(".implode(",", $array_products).")";
        $d = $this->db->ExecutionQuery($query);
        return $d;
    }

    public function insert()
    {
        $this->db->ExecutionQuery("INSERT INTO product(name,image,price,unit) VALUES ('qwe','Image',12.999,'грн')");
    }

    public function update(){}

    public function delete(){}
}