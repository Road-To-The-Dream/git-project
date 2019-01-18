<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 08.01.2019
 * Time: 14:43
 */

namespace practice\Model;

class Product extends Model
{
    private $db;
    public $id_product = 0;

    public function __construct()
    {
        $this->db = $this->ConnectionDB();
    }

    public function select($sorting = 0)
    {
        if($this->id_product == 0) {
            if($sorting == 1) {
                return $this->db->ExecutionQuery('SELECT id, name, price, unit FROM product ORDER BY price DESC');
            }
            else if($sorting == 2) {
                return $this->db->ExecutionQuery('SELECT id, name, price, unit  FROM product ORDER BY price ASC');
            }
        }
        else {
            $q = $this->db->ExecutionQuery("SELECT cl.first_name, com.id, com.content, date_added, com.client_id FROM comments com JOIN client cl ON cl.id = com.client_id JOIN product pr ON pr.id = com.product_id WHERE pr.id = ".$this->id_product." ORDER BY com.date_added DESC");
            $w = $this->db->ExecutionQuery("SELECT id, name, description, price, unit, amount FROM product WHERE id = ".$this->id_product);

            $result = array_merge((array)$q, (array)$w);

            return $result;
        }
        return $this->db->ExecutionQuery("SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, (SELECT img FROM images i JOIN images_in_product ip ON ip.images_id = i.id WHERE ip.product_id = p.id LIMIT 1) as image FROM product p");
    }

    public function insert(){}

    public function update(){}

    public function delete(){}
}