<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 08.01.2019
 * Time: 14:43
 */

namespace practice\Model\ActiveRecord;

use practice\Model\Model;
use practice\Model\ConnectionManager;

class Product extends Model
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $unit;
    private $amount;

    public function __construct()
    {
        $this->connectionDB();
    }

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return array
     */
    public function selectProduct()
    {
        $sql = "SELECT id, name, description, price, unit, amount FROM product WHERE id = ".$this->id;

        $info_product = ConnectionManager::executionQuery($sql);
        $info_product = $this->addSpaceToPriceProduct($info_product, "price");

        $productList = array();

        $objProduct = new Product();
        $objProduct->setId($info_product[0]['id']);
        $objProduct->setName($info_product[0]['name']);
        $objProduct->setDescription($info_product[0]['description']);
        $objProduct->setPrice($info_product[0]['price']);
        $objProduct->setUnit($info_product[0]['unit']);
        $objProduct->setAmount($info_product[0]['amount']);
        $productList['info_product'] = $objProduct;

        return $productList;
    }

    /**
     * @param int $sorting
     * @param int $category
     * @return mixed|null
     */
    public function selectAll($sorting = 0, $category = 0)
    {
        if ($sorting == 1) {
            $sql_catalog = "SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, 
                                                                  (SELECT img FROM images i 
                                                                    JOIN images_in_product ip ON ip.images_id = i.id 
                                                                   WHERE ip.product_id = p.id LIMIT 1) as image 
                                                            FROM product p 
                                                              JOIN categories c ON c.id = p.category_id 
                                                            WHERE c.id = $category ORDER BY price DESC";
            return ConnectionManager::executionQuery($sql_catalog);
        } elseif ($sorting == 2) {
            return ConnectionManager::executionQuery("SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, 
                                                                  (SELECT img FROM images i 
                                                                    JOIN images_in_product ip ON ip.images_id = i.id 
                                                                   WHERE ip.product_id = p.id LIMIT 1) as image 
                                                            FROM product p 
                                                              JOIN categories c ON c.id = p.category_id 
                                                            WHERE c.id = $category ORDER BY price ASC");
        }

        if ($category == 0) {
            return ConnectionManager::executionQuery("SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, 
                                                                  (SELECT img FROM images i 
                                                                    JOIN images_in_product ip ON ip.images_id = i.id 
                                                                   WHERE ip.product_id = p.id LIMIT 1) as image 
                                                            FROM product p");
        } else {
            $sql = "SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, 
                                                                  (SELECT img FROM images i 
                                                                    JOIN images_in_product ip ON ip.images_id = i.id 
                                                                   WHERE ip.product_id = p.id LIMIT 1) as image 
                                                            FROM product p 
                                                              JOIN categories c ON c.id = p.category_id 
                                                            WHERE c.id = ".$category;

            $sql = $this->addSpaceToPriceProduct(ConnectionManager::executionQuery($sql), 'price');

            return $sql;
        }
    }

    /**
     * @param $id_client
     * @return array|null
     */
    public function checkExistSessionAndSelectProduct($id_client)
    {
        $data = ConnectionManager::executionQuery("SELECT id, name, price, unit FROM product WHERE id = ".$this->id_product);

        if (isset($_SESSION['user_id'])) {
            $query = "SELECT first_name, last_name, email, phone FROM client WHERE id = ".$id_client;
            $sql_client = ConnectionManager::executionQuery($query);
            $data = array_merge((array)$data, (array)$sql_client);
        }

        $data[0]['amount'] = $_POST['amount'];
        $data[0]['total_price'] = $_POST['amount'] * $data[0]['price'];

        return $data;
    }

    public function filtration($array_vendors, $category)
    {
        $sql = "SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, (SELECT img FROM images i 
                                                                    JOIN images_in_product ip ON ip.images_id = i.id 
                                                                   WHERE ip.product_id = p.id LIMIT 1) as image  FROM vendor v 
JOIN product p ON p.vendor_id = v.id
JOIN categories c ON p.category_id = c.id WHERE c.id = 1 AND v.id = 1";
$w = ConnectionManager::executionQuery($sql);
        return $w;
    }

    public function insert(){}

    public function update(){}

    public function delete(){}
}
