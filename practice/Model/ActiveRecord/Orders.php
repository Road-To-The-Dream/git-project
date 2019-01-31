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


class Orders extends Model
{
    private $id;
    private $status;
    private $price;
    private $amount;
    private $client_id;
    private $product_id;
    private $order_id;
    private $message_about_adding_product = array("", "", "");
    private $info_price = array("", "", "");
    private $total_price;

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * @param mixed $total_price
     */
    public function setTotalPrice($total_price): void
    {
        $this->total_price = $total_price;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = '\'' . $status . '\'';
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
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id
     */
    public function setClientId($client_id): void
    {
        $this->client_id = $client_id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id): void
    {
        $this->order_id = $order_id;
    }

    public function __construct()
    {
        $this->connectionDB();
    }

    private function addedProductsInObject($products_cart)
    {
        $productsList = array();

        for ($i = 0; $i < count($products_cart); $i++) {
            $objCart = new Orders();
            $objCart->setProductId($products_cart[$i]['product_id']);
            $objCart->setPrice($products_cart[$i]['price']);
            $objCart->setAmount($products_cart[$i]['amount']);
            $objCart->setTotalPrice($products_cart[$i]['total_price']);
            $productsList[$i] = $objCart;
        }

        return $productsList;
    }

    /**
     * @return Orders
     */
    public function selectIdOrder()
    {
        $sql = "SELECT MAX(id) AS id FROM orders WHERE status = 'done' AND client_id = " . $this->getClientId();
        $id = ConnectionManager::executionQuery($sql);

        return $id[0]['id'];
    }

    /**
     * @return Orders
     */
    public function selectAmountProductsInCart()
    {
        $sql = "SELECT id FROM orders WHERE status = 'cart' AND client_id = " . $this->getClientId();
        $amount = ConnectionManager::executionQuery($sql);
        $orders = new Orders();
        $orders->setAmount(count($amount));

        return $orders;
    }

    public function selectIdProductForOrder()
    {
        $sql = "SELECT pio.product_id FROM orders o JOIN product_in_orders pio ON o.id = pio.order_id WHERE o.id = " . $this->getId();
        $id_product = ConnectionManager::executionQuery($sql);
        $orders = new Orders();
        $orders->setProductId($id_product[0]['product_id']);

        return $orders;
    }

    public function selectPriceAndAmount()
    {
        $sql = "SELECT o.id, o.price, o.amount FROM orders o 
                JOIN product_in_orders po ON o.id = po.order_id 
                WHERE o.client_id = " . $this->getClientId() . " AND o.status = " . $this->getStatus() . " AND po.product_id = " . $this->getProductId();
        $info_order = ConnectionManager::executionQuery($sql);

        $objCart = new Orders();
        $objCart->setId($info_order[0]['id']);
        $objCart->setPrice($info_order[0]['price']);
        $objCart->setAmount($info_order[0]['amount']);

        return $objCart;
    }

    /**
     * @return array|int|null
     */
    public function selectProducts()
    {
        $sql = "SELECT po.product_id, o.price, o.amount, o.client_id FROM orders o
                JOIN product_in_orders po ON po.order_id = o.id 
                JOIN product p ON po.product_id = p.id WHERE o.status = " . $this->getStatus() . " AND o.client_id = " . $this->getClientId();
        $products_cart = ConnectionManager::executionQuery($sql);
        if ($products_cart == null) {
            return 0;
        } else {
            for ($i = 0; $i < count($products_cart); $i++) {
                $products_cart[$i]['total_price'] = $products_cart[$i]['price'] * $products_cart[$i]['amount'];
            }
            $products_cart = self::addSpaceToPriceProduct($products_cart, "price");
            $products_cart = self::addSpaceToPriceProduct($products_cart, "total_price");
            $products_cart = $this->addedProductsInObject($products_cart);
            return $products_cart;
        }
    }

    /**
     * @param $price
     * @return mixed
     */
    private function removeSpacesInPrice($price)
    {
        return str_replace(' ', '', $price);
    }


    public function getTotalPriceProducts()
    {
        $DBdata = $this->selectTotalPriceAndAmountProducts();

        $price = [0]['total_price'];
        for ($i = 0; $i < count($DBdata); $i++) {
            $price[0]['total_price'] += $DBdata[$i]['price'] * $DBdata[$i]['amount'];
        }

        $total_price_products = self::addSpaceToPriceProduct($price, 'total_price');
        $total_price_products = $total_price_products[0]['total_price'];
        echo $total_price_products;
    }

    /**
     * @return null
     */
    private function selectTotalPriceAndAmountProducts()
    {
        $sql = "SELECT price, amount FROM orders WHERE status = " . $this->getStatus() . " AND client_id = " . $this->getClientId();
        $DBdata = ConnectionManager::executionQuery($sql);
        return $DBdata;
    }

    private function selectIdAndAmountProductInCart()
    {
        $sql = "SELECT po.product_id, o.amount FROM orders o
                JOIN product_in_orders po ON po.order_id = o.id 
                JOIN product p ON po.product_id = p.id WHERE o.status = " . $this->getStatus() . " AND o.client_id = " . $this->getClientId();
        return $products_cart = ConnectionManager::executionQuery($sql);
    }

    private function checkExistProductInCartAndAddingInDataBaseAndSession()
    {
        $amount_products = $this->selectIdAndAmountProductInCart();
        if ($amount_products != null) {
            foreach ($amount_products as $amount) {
                if ($amount['product_id'] == $_POST['IDProduct']) {
                    $this->message_about_adding_product[0] = "Товар уже имеется в корзине ! Перейдите в корзину для покупки.";
                    $this->message_about_adding_product[1] = "error";
                    return;
                }
            }
        }

        $this->setAmount(1);
        $this->insert();
        $this->updateDecreaseAmountProductInTableProduct();

        $this->message_about_adding_product[0] = "Товар добавлен в корзину !";
        $this->message_about_adding_product[1] = "success";

        $_SESSION['count_product_in_cart'] += 1;
        $this->message_about_adding_product[2] = $_SESSION['count_product_in_cart'];
    }

    public function addingProductInCart()
    {
        session_start();
        if (isset($_SESSION['isAuth'])) {
            $this->checkExistProductInCartAndAddingInDataBaseAndSession();
        } else {
            session_destroy();
            $this->message_about_adding_product[0] = "Для добавления товара в корзину требуется войти в аккаунт!";
            $this->message_about_adding_product[1] = "error";
        }

        echo json_encode($this->message_about_adding_product);
    }

    private function increaseAmountProductAndUpdateInDataBase($amount_units, $price_product, $total_price_product, $price_all_products, $amount_product)
    {
        if ($amount_product[0]['amount'] != 0) {
            $amount_units++;
            $this->updateDecreaseAmountProductInTableProduct();
            $this->updateIncreaseAmountInTableOrder();
            $price_all_products += $price_product;
            $total_price_product = $amount_units * $price_product;
        }

        $this->info_price[0] = $amount_units;

        $total_price_product = $this->addSpaceInPrice($total_price_product);
        $price_all_products = $this->addSpaceInPrice($price_all_products);

        $this->info_price[1] = $total_price_product[0]['price'];
        $this->info_price[2] = $price_all_products[0]['price'];

        return json_encode($this->info_price);
    }

    private function addSpaceInPrice($total_price_product)
    {
        $total_price_product = array(
            0 => [
                'price' => $total_price_product
            ]
        );

        return $total_price_product = self::addSpaceToPriceProduct($total_price_product, 'price');
    }

    private function decreaseAmountProductAndUpdateInDataBase($amount_units, $price_product, $price_all_products)
    {
        $amount_units--;
        $this->setAmount(1);
        $this->updateIncreaseAmountProductInTableProduct();
        $this->updateDecreaseAmountProductInTableOrder();
        $total_price_product = $amount_units * $price_product;
        $price_all_products -= $price_product;

        $total_price_product = $this->addSpaceInPrice($total_price_product);
        $price_all_products = $this->addSpaceInPrice($price_all_products);

        $this->info_price[0] = $amount_units;
        $this->info_price[1] = $total_price_product[0]['price'];
        $this->info_price[2] = $price_all_products[0]['price'];

        return json_encode($this->info_price);
    }

    public function countTotalPriceProductAndChangeAmountInDataBase($amount_product)
    {
        $amount_units = $_POST['amount_units'];
        $price_product = $this->removeSpacesInPrice($_POST['price_product']);
        $total_price_product = $this->removeSpacesInPrice($_POST['total_price_product']);
        $price_all_products = $this->removeSpacesInPrice($_POST['price_all_products']);

        if ($_POST['btn_value'] == '+') {
            echo $this->increaseAmountProductAndUpdateInDataBase($amount_units, $price_product, $total_price_product, $price_all_products, $amount_product);
        } else {
            if ($amount_units > 1) {
                echo $this->decreaseAmountProductAndUpdateInDataBase($amount_units, $price_product, $price_all_products);
            }
        }
    }

    public function insert()
    {
        $product = new Product();
        $product->setId($_POST['IDProduct']);
        $price_product = $product->selectPriceProduct();

        $sql = "INSERT INTO orders (price, amount, create_at, client_id) VALUE ({$price_product[0]['price']}, {$this->getAmount()}, {$this->getCreateAt()}, {$this->getClientId()})";
        ConnectionManager::executionQuery($sql);

        $sql = "SELECT MAX(id) AS id FROM orders";
        $id = ConnectionManager::executionQuery($sql);

        $sql = "INSERT INTO product_in_orders (product_id, order_id, create_at) VALUES ({$this->getProductId()}, {$id[0]['id']}, {$this->getCreateAt()})";
        ConnectionManager::executionQuery($sql);
    }

    public function updateDecreaseAmountProductInTableProduct()
    {
        $product = new Product();
        $product->setId($this->getProductId());
        $product->updateDecreaseAmount();
    }

    private function updateIncreaseAmountInTableOrder()
    {
        $sql = "UPDATE orders o JOIN product_in_orders po ON po.order_id = o.id SET o.amount = o.amount + 1, o.update_at = {$this->getUpdateAt()} 
                WHERE po.product_id = {$this->getProductId()} AND o.client_id = {$this->getClientId()}";
        ConnectionManager::executionQuery($sql);
    }

    public function updateIncreaseAmountProductInTableProduct()
    {
        $product = new Product();
        $product->setId($this->getProductId());
        $product->setAmount($this->getAmount());
        $product->setUpdateAt($this->getUpdateAt());
        $product->updateIncreaseAmount();
    }

    private function updateDecreaseAmountProductInTableOrder()
    {
        $sql = "UPDATE orders o JOIN product_in_orders po ON po.order_id = o.id SET o.amount = o.amount - 1, o.update_at = {$this->getUpdateAt()} 
                WHERE po.product_id = {$this->getProductId()} AND o.client_id = {$this->getClientId()}";
        ConnectionManager::executionQuery($sql);
    }

    public function updateStatusOrder()
    {
        $sql = "UPDATE orders o JOIN product_in_orders po ON po.order_id = o.id SET o.status = 'done'
                WHERE po.product_id = " . $this->getProductId() . " AND o.client_id = " . $this->getClientId();
        ConnectionManager::executionQuery($sql);
    }

    public function deleteOne()
    {
        $sql = "DELETE o FROM orders o JOIN product_in_orders po ON o.id = po.order_id 
                WHERE po.product_id = " . $this->getProductId() . " AND o.client_id = " . $this->getClientId();
        ConnectionManager::executionQuery($sql);

        $this->updateIncreaseAmountProductInTableProduct();
    }

    public function deleteAll()
    {
        $amount_product = $this->selectIdAndAmountProductInCart();
        $product = new Product();
        $product->setUpdateAt('\'' . date("Y-m-d H:i:s") . '\'');
        for ($i = 0; $i < count($amount_product); $i++) {
            $product->setId($amount_product[$i]['product_id']);
            $product->setAmount($amount_product[$i]['amount']);
            $product->updateIncreaseAmount();
        }
        $sql = "DELETE FROM orders WHERE status = " . $this->getStatus() . " AND client_id = " . $this->getClientId();
        ConnectionManager::executionQuery($sql);
    }
}
