<?php

    namespace practice\Controller;

    class Controller
    {
        private $dataModel;
        private $objModel;
        private $objectGenerateView;
        private $login = "fhlbc2012@gmail.com";
        private $password = 123;

        public function __construct()
        {
            $this->objModel = new \practice\Model\Model();
            $this->objectGenerateView = new View();
        }

        public function show_all($view_name, $sorting = 0)
        {
            $this->check_session();
            $this->dataModel = $this->objModel->get_all_info($sorting);

            $this->objectGenerateView->generate($view_name, $this->dataModel);
        }

        public function show_product($view_name, $id = 1)
        {
            $this->check_session();
            $this->dataModel = $this->objModel->get_product_id($id);

            $this->objectGenerateView->generate($view_name, $this->dataModel);
        }

        public function show_product_cart($view_name)
        {
            $this->check_session();
            $this->dataModel = $this->objModel->get_products_cart();

            $this->objectGenerateView->generate($view_name, $this->dataModel);
        }

        public function show_main($view_name)
        {
            $this->check_session();
            $this->objectGenerateView->generate($view_name, $this->dataModel);
        }

        public function show_404($view_name)
        {
            $this->objectGenerateView->generate($view_name, $this->dataModel);
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

        private function check_session()
        {
            session_start();
            if(isset($_SESSION['isAuth'])) {
                include "View\Template\header_logout.php";
            }
            else {
                include "View\Template\header_login.php";
            }
        }
    }
