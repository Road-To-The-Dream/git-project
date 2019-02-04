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
     * @param $info_products
     * @return array
     */
    private function addedProductsInObject($info_products)
    {
        $productsList = array();

        for ($i = 0; $i < count($info_products); $i++) {
            $objProduct = new Product();
            $objProduct->setId($info_products[$i]['id']);
            $objProduct->setName($info_products[$i]['name']);
            $objProduct->setDescription($info_products[$i]['description']);
            $objProduct->setPrice($info_products[$i]['price']);
            $objProduct->setUnit($info_products[$i]['unit']);
            $objProduct->setAmount($info_products[$i]['amount']);
            $productsList[$i] = $objProduct;
        }

        return $productsList;
    }

    /**
     * @return array
     */
    public static function selectAllProductForAdmin()
    {
        ConnectionManager::getInstance();
        $sql = "SELECT id, name, description, price, unit, amount FROM product";

        $info_product = ConnectionManager::executionQuery($sql);

        $Obj = new self;
        $productList = $Obj->addedProductsInObject($info_product);

        return $productList;
    }

    /**
     * @param int $category
     * @param $array_vendors
     * @return null
     */
    public static function getAmountProducts($category = 1, $array_vendors)
    {
        ConnectionManager::getInstance();

        $sql = "SELECT COUNT(p.id) as amt FROM product p";

        if (!empty($array_vendors)) {
            $vendors = explode(" ", $array_vendors);
            $vendors = "'" . implode("','", $vendors) . "'";
            $sql .= " JOIN vendor v ON p.vendor_id = v.id WHERE v.name IN ($vendors)";
        }

        if ($category != 1) {
            if (!empty($array_vendors)) {
                $sql .= " AND category_id= $category";
            } else {
                $sql .= " WHERE category_id = $category";
            }
        }

        $amount = ConnectionManager::executionQuery($sql);

        return $amount;
    }

    /**
     * @return array
     */
    public function selectProduct()
    {
        $sql = "SELECT id, name, description, price, unit, amount FROM product WHERE id = " . $this->getId();

        $info_product = ConnectionManager::executionQuery($sql);
        $info_product = self::addSpaceToPriceProduct($info_product, "price");

        $productList = $this->addedProductsInObject($info_product);

        return $productList;
    }

    /**
     * @param int $sorting
     * @param int $category
     * @param string $array_vendors
     * @return array|mixed|null
     */
    public function selectAll($sorting = 0, $category = 1, $array_vendors = "", $limit = 3, $offset = 0)
    {
        $sql = "SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, c.name AS catname FROM product p JOIN categories c ON c.id = p.category_id";

        if (!empty($array_vendors)) {
            $vendors = explode(" ", $array_vendors);
            $vendors = "'" . implode("','", $vendors) . "'";
            $sql .= " JOIN vendor v ON p.vendor_id = v.id WHERE v.name IN ($vendors)";
        }

        if ($category != 1) {
            if (!empty($array_vendors)) {
                $sql .= " AND c.id = $category";
            } else {
                $sql .= " WHERE c.id = $category";
            }
        }

        if ($sorting == 1) {
            $sql .= " ORDER BY price DESC";
        } elseif ($sorting == 2) {
            $sql .= " ORDER BY price ASC";
        }

        $sql .= " LIMIT $limit OFFSET $offset";

        $info_products = ConnectionManager::executionQuery($sql);
        $info_products = self::addSpaceToPriceProduct($info_products, "price");
        $info_products = $this->addedProductsInObject($info_products);

        return $info_products;
    }

    /**
     * @param $array_id_products
     * @return array
     */
    public function selectName($array_id_products)
    {
        $info_names = array();
        for ($i = 0; $i < count($array_id_products); $i++) {
            $sql = "SELECT id, name FROM product WHERE id = $array_id_products[$i]";
            $data_names = ConnectionManager::executionQuery($sql);
            array_push($info_names, $data_names[0]['name']);
        }

        $name = array();

        for ($i = 0; $i < count($info_names); $i++) {
            $objProduct = new Product();
            $objProduct->setName($info_names[$i]);
            $name[$i] = $objProduct;
        }

        return $name;
    }

    /**
     * @return null
     */
    public function selectPriceProduct()
    {
        $sql = "SELECT price FROM product WHERE id = " . $this->getId();
        return $price = ConnectionManager::executionQuery($sql);
    }

    /**
     * @return null
     */
    public function selectAmountProduct()
    {
        $sql = "SELECT amount FROM product WHERE id = " . $this->getId();
        return ConnectionManager::executionQuery($sql);
    }

    public function insert()
    {
    }

    public function updateDecreaseAmount()
    {
        $sql = "UPDATE product SET amount = amount - 1 WHERE id = " . $this->getId();
        ConnectionManager::executionQuery($sql);
    }

    public function updateIncreaseAmount()
    {
        $sql = "UPDATE product SET amount = amount + {$this->getAmount()}, update_at = {$this->getUpdateAt()} 
                WHERE id = " . $this->getId();
        ConnectionManager::executionQuery($sql);
    }

    public function delete()
    {
    }
}
