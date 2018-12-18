<?php

    class ProductModel
    {
        public $items = [];

        public function get_info()
        {
            $this->items = require_once 'list_items.php';
            return $this->items;
        }

        public function show_product($id)
        {
            foreach ($this->data as $value)
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
    }
