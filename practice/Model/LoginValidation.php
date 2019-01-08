<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.01.2019
 * Time: 17:04
 */

    namespace practice\Model;

    class LoginValidation
    {
        private $errors_login = array("", "", "");

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
            $objModel = new \practice\Model\Model();
            $objModel->add_user();
            return json_encode($this->errors_login);
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
    }