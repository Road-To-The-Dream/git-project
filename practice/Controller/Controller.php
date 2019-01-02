<?php

    namespace practice\Controller;

    class Controller
    {
        private $dataModel;
        private $objModel;
        private $objectGenerateView;
        private $errors_login = array("", "", "");
        private $errors_register = array("", "", "", "", "");

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

        public function CheckRegister()
        {
            $count_empty_errors = 0;
            $this->CheckEmptyFieldsRegister();

            foreach ($this->errors_register as $value)
                if($value != "")
                    $count_empty_errors++;

            if($count_empty_errors == 0) {
                $user_name = $this->CleanFields($_POST['user_name']);
                $email = $this->CleanFields($_POST['email_register']);
                $password = $this->CleanFields($_POST['password_register']);
                $confirm_pass = $this->CleanFields($_POST['confirm_password']);
                $this->CheckValidateUserName($user_name);
                $this->CheckValidateEmail($email);
                $this->CheckValidatePassword($password, $confirm_pass);

                //call function register
            }
            echo json_encode($this->errors_register);
        }

        private function CheckValidateUserName($user_name)
        {
            if(!preg_match("/^[a-z0-9_-]{3,16}$/", $user_name)) {
                $this->errors_register[0] = 'Имя пользователя введено неверно. В имени пользователя допускаются буквы, цифры, дефисы и подчёркивания, от 3 до 16 символов.';
            }
        }

        private function CheckValidateEmail($email)
        {
            if(!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $email)) {
                $this->errors_register[1] = 'Адрес электронной почты был введен неверно. Email может содержать только буквы латинского алфавита и цифры, от 3 до 14 символов.
                Также допускается использование символов @ - _';
            }
        }

        private function CheckValidatePassword($password, $confirm_pass)
        {
            if(!preg_match("/^[a-z0-9_-]{6,18}$/",$password)) {
                $this->errors_register[2] = 'Пароль должен состоять из букв английского алфавита и цифр. Также допускается использование символов - _';
            }

            if(strlen($password) < 3 or strlen($password) > 16) {
                $this->errors_register[2] .= ' Длина должна быть не меньше 3-х символов и не больше 16';
            }

            if($this->errors_register[2] == "") {
                if($confirm_pass != $password) {
                    $this->errors_register[3] .= 'Пароли не совпадают !';
                }
            }
        }

        private function CheckEmptyFieldsRegister() {
            if(empty($_POST['user_name']) && empty($_POST['email_register']) && empty($_POST['password_register']) && empty($_POST['confirm_password']) ) {
                $this->errors_login[4] = 'Empty fields form';
            }
            else {
                if (empty($_POST['user_name'])) {
                    $this->errors_login[0] = 'Please enter user name !';
                }
                if (empty($_POST['email_register'])) {
                    $this->errors_login[1] = 'Please enter email !';
                }
                if (empty($_POST['password_register'])) {
                    $this->errors_login[2] = 'Please enter password !';
                }
                if (empty($_POST['confirm_password'])) {
                    $this->errors_login[3] = 'Please enter confirm password !';
                }
            }
        }

        public function CheckLogin()
        {
            $count_empty_errors = 0;
            $this->CheckEmptyFieldsLogin();

            foreach ($this->errors_login as $value)
                if($value != "")
                    $count_empty_errors++;

            if($count_empty_errors == 0) {
                $email = $this->CleanFields($_POST['email_login']);
                $password = $this->CleanFields($_POST['password_login']);
                $auth = new Authentication();
                if($auth->Authentication($email, $password) == 1) {
                    $this->errors_login[2] = 'Invalid password or login';
                }
            }
            echo json_encode($this->errors_login);
        }

        private function CheckEmptyFieldsLogin() {
            if(empty($_POST['email_login']) && empty($_POST['password_login'])) {
                $this->errors_login[2] = 'Empty fields form';
            }
            else {
                if (empty($_POST['email_login'])) {
                    $this->errors_login[0] = 'Please enter email !';
                }
                if (empty($_POST['password_login'])) {
                    $this->errors_login[1] = 'Please enter password !';
                }
            }
        }

        function CleanFields($value_field = "") {
            $value_field = trim($value_field);
            $value_field = stripslashes($value_field);
            $value_field = strip_tags($value_field);
            $value_field = htmlspecialchars($value_field);

            return $value_field;
        }

        public function Logout()
        {
            $auth = new Authentication();
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
