<?php

    class Model
    {
        public $items = [];

        public function __construct()
        {
            $this->items = require_once 'list_items.php';
        }

        public function get_all_info()
        {
            return $this->items;
        }

        public function get_product_id($id)
        {
            foreach ($this->items as $value)
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
            return $this->items;
        }
    }
