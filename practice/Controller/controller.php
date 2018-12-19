<?php

    require_once 'Autoload.php';

    class Controller
    {
        private $data;
        private $obj;

        public function __construct()
        {
            $this->obj = new Model();
        }

        public function show_all($view_name)
        {
            $this->data = $this->obj->get_all_info();

            $obj2 = new View();
            $obj2->generate($view_name.'.php', $this->data);
        }

        public function show_product($view_name, $id = 1)
        {
            $this->data = $this->obj->get_product_id($id);

            $obj2 = new View();
            $obj2->generate($view_name.'.php', $this->data);
        }

        public function show_product_cart($view_name)
        {
            $this->data = $this->obj->get_products_cart();

            $obj2 = new View();
            $obj2->generate($view_name.'.php', $this->data);
        }

        public function show_login($view_name)
        {
            $obj2 = new View();
            $obj2->generate($view_name.'.php', $this->data);
        }

        public function show_main($view_name)
        {
            $obj2 = new View();
            $obj2->generate($view_name.'.php', $this->data);
        }
    }
