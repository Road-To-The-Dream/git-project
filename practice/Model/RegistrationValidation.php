<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.01.2019
 * Time: 17:04
 */

    namespace practice\Model;

    class RegistrationValidation
    {
        private $errors_register = array("", "", "", "", "", "", "", "");
        private $amount_empty_errors = 0;

        private function CheckExistenceEmailAndAddUser($last_name, $first_name, $patronymic, $email, $phone, $password)
        {
            $client = new Client();
            $data_select = $client->selectEmailUser($email);
            if(empty($data_select)) {
                $objModel = new \practice\Model\Model();
                $objModel->add_user($last_name, $first_name, $patronymic, $email, $phone, $password);
            } else {
                $this->errors_register[7] = 'User with this email exists!';
            }
        }

        private function CheckErrorsAndAddNewUser($last_name, $first_name, $patronymic, $email, $phone, $password)
        {
            $this->CountingTheAmountOfErrorsAndWrite();

            if($this->amount_empty_errors == 0) {
                $this->CheckExistenceEmailAndAddUser($last_name, $first_name, $patronymic, $email, $phone, $password);
            }
        }

        private function CheckFieldsForEmptinessAndWriteErrors()
        {
            foreach ($_POST as $value)
            {
                if($value == '' || $value == '+380 ')
                {
                    $this->errors_register[7] = 'Empty fields form';
                }
                else
                {
                    $this->errors_register[7] = '';
                    break;
                }
            }

            if($this->errors_register[7] == '') {
                if (empty($_POST['last_name'])) {
                    $this->errors_register[0] = 'Please enter user name !';
                }
                if (empty($_POST['first_name'])) {
                    $this->errors_register[1] = 'Please enter user name !';
                }
                if (empty($_POST['patronymic'])) {
                    $this->errors_register[2] = 'Please enter user name !';
                }
                if (empty($_POST['email_register'])) {
                    $this->errors_register[3] = 'Please enter email !';
                }
                if ($_POST['phone'] == '+380 ') {
                    $this->errors_register[4] = 'Please enter user name !';
                }
                if (empty($_POST['password_register'])) {
                    $this->errors_register[5] = 'Please enter password !';
                }
                if (empty($_POST['confirm_password'])) {
                    $this->errors_register[6] = 'Please enter confirm password !';
                }
            }
        }

        private function CheckValidateEmail($email)
        {
            if(!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $email)) {
                $this->errors_register[3] = 'Адрес электронной почты был введен неверно. Email может содержать только буквы латинского алфавита и цифры, от 3 до 14 символов.
                    Также допускается использование символов @ - _';
            }
        }

        private function CheckValidatePassword($password, $confirm_pass)
        {
            if(!preg_match("/^[a-z0-9_-]{6,18}$/",$password)) {
                $this->errors_register[5] = 'Пароль должен состоять из букв английского алфавита и цифр. Также допускается использование символов - _.';
            }

            if(strlen($password) < 3 or strlen($password) > 16) {
                $this->errors_register[5] .= ' Длина должна быть не меньше 3-х символов и не больше 16';
            }

            if($this->errors_register[5] == "") {
                if($confirm_pass != $password) {
                    $this->errors_register[6] .= 'Пароли не совпадают !';
                }
            }
        }

        private function CheckValidateFirstNameLastNamePatronymic($value, $piece)
        {
            if(strlen($value) > 50) {
                $this->errors_register[0] = ' Длина '.$piece.' должна быть не больше 50 символов';
            }
        }

        private function CheckValidatePhone($phone)
        {
            if(strlen($phone) != 19) {
                $this->errors_register[4] = 'Заполните поле телефона корректно.';
            }
        }

        function CleanFields($value_field = "") {
            $value_field = trim($value_field);
            $value_field = stripslashes($value_field);
            $value_field = strip_tags($value_field);
            $value_field = htmlspecialchars($value_field);

            return $value_field;
        }

        private function CountingTheAmountOfErrorsAndWrite()
        {
            $this->amount_empty_errors = 0;

            foreach ($this->errors_register as $value)
                if($value != "")
                    $this->amount_empty_errors++;
        }

        public function CheckRegistration()
        {
            $this->CheckFieldsForEmptinessAndWriteErrors();

            $this->CountingTheAmountOfErrorsAndWrite();

            if($this->amount_empty_errors == 0) {
                $last_name = $this->CleanFields($_POST['last_name']);
                $first_name = $this->CleanFields($_POST['first_name']);
                $patronymic = $this->CleanFields($_POST['patronymic']);
                $email = $this->CleanFields($_POST['email_register']);
                $phone = $this->CleanFields($_POST['phone']);
                $password = $this->CleanFields($_POST['password_register']);
                $confirm_pass = $this->CleanFields($_POST['confirm_password']);

                $this->CheckValidateFirstNameLastNamePatronymic($last_name, 'имени');
                $this->CheckValidateFirstNameLastNamePatronymic($first_name, 'фамилии');
                $this->CheckValidateFirstNameLastNamePatronymic($patronymic, 'отчества');
                $this->CheckValidateEmail($email);
                $this->CheckValidatePhone($phone);
                $this->CheckValidatePassword($password, $confirm_pass);

                $this->CheckErrorsAndAddNewUser($last_name, $first_name, $patronymic, $email, $phone, $password);
            }
            return json_encode($this->errors_register);
        }
    }