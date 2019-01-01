<?php

    namespace practice\Controller;

    class Controller
    {
        private $dataModel;
        private $objModel;
        private $objectGenerateView;
        private $errors_login = array("", "", "");
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

        public function Logout()
        {
            $auth = new Authentication();
            $auth->logout();
            header('Location: http://practice/main/show_main');
        }

        public function CheckLogin()
        {
            $this->CheckEmptyFields();

            if(!empty($_POST['email']) && !empty($_POST['password'])) {
                $this->CheckEmail($_POST['email']);
                $this->CheckPassword($_POST['password']);
                if($this->errors_login[0] == '' && $this->errors_login[1] == '') {
                    $auth = new Authentication();
                    if($auth->Authentication($_POST['email'], $_POST['password']) == 1) {
                        $this->errors_login[2] = 'Invalid password or login';
                    }
                }
            }
            echo json_encode($this->errors_login);
        }

        private function CheckEmptyFields() {
            if(empty($_POST['email']) && empty($_POST['password'])) {
                $this->errors_login[2] = 'Empty fields form';
            }
            else {
                if (empty($_POST['email'])) {
                    $this->errors_login[0] = 'Please enter email !';
                }
                if (empty($_POST['password'])) {
                    $this->errors_login[1] = 'Please enter password !';
                }
            }
        }

        private function CheckEmail($email)
        {
            if(!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $email)) {
                $this->errors_login[0] = 'Адрес электронной почты был введен неверно. Email может содержать только буквы латинского алфавита и цифры, от 3 до 14 символов.
                Также допускается использование символов @ - _';
            }
        }

        private function CheckPassword($password)
        {
            if(!preg_match("/^[a-z0-9_-]{6,18}$/",$password)) {
                $this->errors_login[1] = 'Пароль должен состоять из букв английского алфавита и цифр. Также допускается использование символов - _';
            }

            if(strlen($password) < 3 or strlen($password) > 16) {
                $this->errors_login[1] .= ' Длина должна быть не меньше 3-х символов и не больше 16';
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
