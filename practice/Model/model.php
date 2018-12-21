<?php

    class Model
    {
        private $items_catalog = [];
        private $items_cart = [];

        public function __construct()
        {
            $this->items_catalog = require_once 'list_items.php';
            $this->items_cart = require_once 'list_items_cart.php';
        }

        public function get_all_info($sorting = 0)
        {
            if($sorting == 1)
            {
                uasort($this->items_catalog, function($a, $b) // sort descending
                {
                    return ($b['price'] - $a['price']);
                });
            }
            else if($sorting == 2)
            {
                uasort($this->items_catalog, function($a, $b) // sort ascending
                {
                    return ($a['price'] - $b['price']);
                });
            }
            return $this->items_catalog;
        }

        public function get_product_id($id)
        {
            foreach ($this->items_catalog as $value)
            {
                if($value["id"] == $id)
                {
                    return array(
                        'name' => $value['name'],
                        'image' => $value['image'],
                        'price' => $value['price'],
                    );
                }
            }
        }

        public function get_products_cart()
        {
            return $this->items_cart;
        }
    }
