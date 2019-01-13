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
            $this->checkSessionAndStart();
            $this->dataModel = $this->objModel->GetAllProduct($sorting);

            $this->objectGenerateView->generate($view_name, $this->dataModel);
        }

        public function correct()
        {
            $arr = array('Acer', 'Apple', 'Lenovo', 'Prestigio');
            echo json_encode($arr);
        }

        public function show_product($view_name, $id = 1)
        {
            $this->checkSessionAndStart();
            $this->dataModel = $this->objModel->GetProductId($id);
            $this->objectGenerateView->generate($view_name, $this->dataModel);
        }

        public function show_product_cart($view_name)
        {
            $this->checkSessionAndStart();
            $this->dataModel = $this->objModel->GetProductCart($_SESSION['product_id']);

            $this->objectGenerateView->generate($view_name, $this->dataModel);
        }

        public function show_main($view_name)
        {
            $this->checkSessionAndStart();
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

        public function CheckSessionAndAddingProductInCart()
        {
            $this->objModel->CheckExistArrayProductInSession();
        }

        public function CountTotalPriceProduct()
        {
            $this->objModel->CountTotalPriceProduct();
        }

        public function GetTotalPriceProducts()
        {
            session_start();
            $this->objModel->GetTotalPriceProducts($_SESSION['product_id']);
        }

        public function RemoveProductForCart()
        {
            $this->objModel->RemoveProductInCart($_POST['IDProduct']);
        }

        public function Logout()
        {
            $auth = new \practice\Model\Authentication();
            $auth->CleanAndDestroySession();
            header('Location: http://practice/main/show_main');
        }

        private function checkSessionAndStart()
        {
            session_start();
            if(isset($_SESSION['isAuth'])) {
                if(!isset($_SESSION['product_id'])) {
                    $_SESSION['product_id'] = [];
                }
                include "View\Template\header_logout.php";
            }
            else {
                session_destroy();
                include "View\Template\header_login.php";
            }
        }
    }
