<?php

    class Model
    {
        public $items = [];

        public function __construct()
        {
            $this->items = require_once 'list_items.php';
        }

        public function get_all_info($sorting = 0)
        {
            if($sorting == 1)
            {
                uasort($this->items, function($a, $b)
                {
                    return ($a['price'] - $b['price']);
                });
            }
            else if($sorting == 2)
            {
                uasort($this->items, function($a, $b)
                {
                    return ($b['price'] - $a['price']);
                });
            }

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
