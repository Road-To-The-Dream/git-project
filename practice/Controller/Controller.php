<?php

    namespace practice\Controller;

    class Controller
    {
        private $dataModel;
        private $objModel;
        private $objectGenerateView;

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

        public function ValidateIsRegister()
        {
            $objRegistrationValidation = new \practice\Model\RegistrationValidation();
            echo $objRegistrationValidation->CheckRegistration();
        }

        public function ValidateIsLogin()
        {
            $objLoginValidation = new \practice\Model\LoginValidation();
            echo $objLoginValidation->CheckLogin();
        }

        public function Logout()
        {
            $auth = new \practice\Model\Authentication();
            $auth->logout();
            header('Location: http://practice/main/show_main');
        }

        private function check_session()
        {
            session_start();
            if(isset($_SESSION['isAuth'])) {
                include "View\Template\header_logout.php";
            }
            else {
                session_destroy();
                include "View\Template\header_login.php";
            }
        }
    }
