<?php

    namespace practice\Model;

    class Model
    {
        private $config = [];

        public function __construct()
        {
            $this->config = require 'DBconfiguration.php';
        }

        public function add_user()
        {
            $db = new ShowProduct($this->config);

            $db->query("INSERT INTO products(name,image,price,unit) VALUES ('qwe','Image',12.999,'грн')");
        }

        public function get_all_info($sorting = 0)
        {
            $db = new ShowProduct($this->config);

            $query = $db->query('SELECT * FROM products');

            if($sorting == 1) {
                $query = $db->query('SELECT * FROM products ORDER BY price DESC');
            }
            elseif($sorting == 2) {
                $query = $db->query('SELECT * FROM products ORDER BY price ASC');
            }

            return $query;
        }

        public function get_product_id($id)
        {
            $db = new ShowProduct($this->config);

            $query = $db->query('SELECT * FROM products WHERE id = '.$id);

            return $query;
        }

        public function get_products_cart()
        {
            return $this->items_cart;
        }
    }
