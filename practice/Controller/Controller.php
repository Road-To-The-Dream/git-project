<?php

    namespace practice\Controller;

    class Controller
    {
        private $data;
        private $obj;
        private $login = "fhlbc2012@gmail.com";
        private $password = 123;

        public function __construct($view_name)
        {
            //$this->CheckAuth();
            if($view_name != 'main') {
                $this->obj = new \practice\Model\Model();
            }
        }

        public function CheckAuth()
        {
           session_start();
           if(!isset($_SESSION['isAuth'])) {
               $errors = array("", "", "");
               if(empty($_POST['email']) && empty($_POST['password'])) {
                   $errors[2] = 'Empty fields form';
               }
               else{
                   if (empty($_POST['email'])) {
                       $errors[0] = 'Please enter email !';
                   }
                   if (empty($_POST['password'])) {
                       $errors[1] = 'Please enter password !';
                   }
               }


               if(!empty($_POST['email']) && !empty($_POST['password'])) {
                   $auth = new Authentication();
                   if($auth->Auth($_POST['email'], $_POST['password']) == 1) {
                       $errors[2] = 'Invalid password or login';
                   }
               }

               echo json_encode($errors);
           }
           else
           {
               $auth = new Authentication();
               $auth->logout();
               header('Location: http://practice/main/show_main');
           }
        }

        public function sign_in()
        {
            include '';
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
            session_start();
            if(isset($_SESSION['isAuth'])) {
                include "View\Template\header_logout.php";
            }
            else {
                include "View\Template\header_login.php";
            }

            $obj2 = new View();
            $obj2->generate($view_name.'.php', $this->data);
        }

        public function show_404($view_name)
        {
            $obj2 = new View();
            $obj2->generate($view_name.'.html', $this->data);
        }
    }
