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
    private $errors_register = array("", "", "", "", "");

    public function CheckRegistration()
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
        }
        return json_encode($this->errors_register);
    }

    private function CheckEmptyFieldsRegister()
    {
        if(empty($_POST['user_name']) && empty($_POST['email_register']) && empty($_POST['password_register']) && empty($_POST['confirm_password']) ) {
            $this->errors_register[4] = 'Empty fields form';
        }
        else {
            if (empty($_POST['user_name'])) {
                $this->errors_register[0] = 'Please enter user name !';
            }
            if (empty($_POST['email_register'])) {
                $this->errors_register[1] = 'Please enter email !';
            }
            if (empty($_POST['password_register'])) {
                $this->errors_register[2] = 'Please enter password !';
            }
            if (empty($_POST['confirm_password'])) {
                $this->errors_register[3] = 'Please enter confirm password !';
            }
        }
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
            $this->errors_register[2] = 'Пароль должен состоять из букв английского алфавита и цифр. Также допускается использование символов - _.';
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

    function CleanFields($value_field = "") {
        $value_field = trim($value_field);
        $value_field = stripslashes($value_field);
        $value_field = strip_tags($value_field);
        $value_field = htmlspecialchars($value_field);

        return $value_field;
    }
}