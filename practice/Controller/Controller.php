<?php

    namespace practice\Controller;

    class Controller
    {
        private $objectGenerateView;

        public function __construct()
        {
            $this->objectGenerateView = new View();
        }

        public function show_all($view_name, $sorting = 0)
        {
            $this->checkSessionAndStart();

            $product = new \practice\Model\Product();
            $DBdata = $product->select($sorting);

            $this->objectGenerateView->generate($view_name, $DBdata);
        }

        public function correct()
        {
            $arr = array('Acer', 'Apple', 'Lenovo', 'Prestigio');
            echo json_encode($arr);
        }

        public function show_product($view_name, $id = 1)
        {
            $this->checkSessionAndStart();

            $product = new \practice\Model\Product();
            $product->id_product = $id;
            $DBdata = $product->select();

            $this->objectGenerateView->generate($view_name, $DBdata);
        }

        public function show_product_cart($view_name)
        {
            $this->checkSessionAndStart();

            $cart = new \practice\Model\Cart();
            $DBdata = $cart->select($_SESSION['product_id']);

            $this->objectGenerateView->generate($view_name, $DBdata);
        }

        public function show_main($view_name)
        {
            $this->checkSessionAndStart();
            $this->objectGenerateView->generate($view_name);
        }

        public function show_buy($view_name, $id)
        {
            $this->checkSessionAndStart();

            $order = new \practice\Model\Order();
            $order->insert();

            $product = new \practice\Model\Product();
            $DBdata = $product->select();

            $this->objectGenerateView->generate($view_name, $DBdata);
        }

        public function show_404($view_name)
        {
            $this->objectGenerateView->generate($view_name);
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

        public function AddingProductsInCart()
        {
            $cart = new \practice\Model\Cart();
            $cart->CheckExistArrayProductsAndAddingProductsInCart();
        }

        public function CountTotalPriceProduct()
        {
            $cart = new \practice\Model\Cart();
            $cart->CountTotalPriceProduct();
        }

        public function GetTotalPriceProducts()
        {
            session_start();
            $cart = new \practice\Model\Cart();
            $cart->GetTotalPriceProducts($_SESSION['product_id']);
        }

        public function RemoveProductForCart()
        {
            $cart = new \practice\Model\Cart();
            $cart->delete($_POST['IDProduct']);
        }

        public function AddingComments()
        {
            $validate_comment = new \practice\Model\ValidateComment();
            echo $validate_comment->ValidateTextComment($_POST['TextComment']);
        }

        public function RemoveComments()
        {
            $comment = new \practice\Model\Comment();
            $comment->delete($_POST['id_comment']);
        }

        public function AddingOrder()
        {

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
