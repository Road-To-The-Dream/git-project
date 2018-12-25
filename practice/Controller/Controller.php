<?php

    namespace practice\Controller;

    class Controller
    {
        private $data;
        private $obj;
        private $login = "fhlbc2012@gmail.com";
        private $password = 123;

        public function __construct()
        {
            //$this->CheckAuth();
            $this->obj = new \practice\Model\Model();
        }

        public function CheckAuth()
        {
            $obj2 = new View();
            if(isset($_POST['btn_login']))
            {
                if(!empty($_POST['email']) && !empty($_POST['password'])) {
                    $auth = new Authentication();
                    if($auth->Auth($_POST['email'], $_POST['password']) == 1) {
                        $errors = 'Invalid password or login';
                    }
                    else
                    {
                        $auth->Auth($_POST['email'], $_POST['password']);
                        $obj2->generate('\View\sign_in'.'.php', $this->data);
                    }
                }
                if (empty($_POST['email'])) {
                    $errror_email = 'Please enter email !';
                }
                if (empty($_POST['password'])) {
                    $error_pass = 'Please enter password !';
                }
                //$obj2->generate('sign_in'.'.php', $this->data);
                include 'View\login.php';
            }
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
