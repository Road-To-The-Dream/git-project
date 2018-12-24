<?php

    namespace practice\Controller;

    class Controller
    {
        private $data;
        private $obj;

        public function __construct()
        {
            $this->obj = new \practice\Model\Model();
        }

        public function show_all($view_name, $sorting = 0)
        {
            $this->data = $this->obj->get_all_info($sorting);

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

        public function show_404($view_name)
        {
            $obj2 = new View();
            $obj2->generate($view_name.'.html', $this->data);
        }
    }