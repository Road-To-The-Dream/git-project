<?php

    require_once 'Model/file_items.php';
    require_once 'Controller/View.php';

    class Controller
    {
        private $data;

        public function __construct()
        {
            $obj = new ProductModel();
            $this->data = $obj->get_info();
        }

        public function show_all($view_name)
        {
            $obj2 = new View();
            $obj2->generate($view_name.'.php', $this->data);
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
