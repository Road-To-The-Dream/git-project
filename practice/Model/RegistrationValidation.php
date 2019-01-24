<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.01.2019
 * Time: 17:04
 */

namespace practice\Model;

use practice\Model\ActiveRecord\Client;

class RegistrationValidation
{
    private $errors_register = array("", "", "", "", "", "", "", "");
    private $amount_empty_errors = 0;

    /**
     * @return string
     */
    public function checkRegistration()
    {
        $this->checkFieldsForEmptinessAndWriteErrors();

        $this->countingTheAmountOfErrors();

        if ($this->amount_empty_errors == 0) {
            $this->checkValidateFirstNameLastNamePatronymic($_POST['last_name'], 'имени');
            $this->checkValidateFirstNameLastNamePatronymic($_POST['first_name'], 'фамилии');
            $this->checkValidateFirstNameLastNamePatronymic($_POST['patronymic'], 'отчества');
            $this->checkValidateEmail($_POST['email_register']);
            $this->checkValidatePhone($_POST['phone']);
            $this->checkValidatePassword($_POST['password_register'], $_POST['confirm_password']);

            $this->checkErrorsAndAddNewUser($_POST['last_name'], $_POST['first_name'], $_POST['patronymic'], $_POST['email_register'], $_POST['phone'], $_POST['password_register']);
        }

        return json_encode($this->errors_register);
    }

    private function countingTheAmountOfErrors()
    {
        $this->amount_empty_errors = 0;

        foreach ($this->errors_register as $value) {
            if ($value != "") {
                $this->amount_empty_errors++;
            }
        }
    }

    /**
     * @param $last_name
     * @param $first_name
     * @param $patronymic
     * @param $email
     * @param $phone
     * @param $password
     */
    private function checkErrorsAndAddNewUser($last_name, $first_name, $patronymic, $email, $phone, $password)
    {
        $this->countingTheAmountOfErrors();

        if ($this->amount_empty_errors == 0) {
            $last_name = $this->cleanFields($last_name);
            $first_name = $this->cleanFields($first_name);
            $patronymic = $this->cleanFields($patronymic);
            $email = $this->cleanFields($email);
            $phone = $this->cleanFields($phone);
            $password = $this->cleanFields($password);
            $this->checkExistenceEmailAndAddUser($last_name, $first_name, $patronymic, $email, $phone, $password);
        }
    }

    /**
     * @param $last_name
     * @param $first_name
     * @param $patronymic
     * @param $email
     * @param $phone
     * @param $password
     */
    private function checkExistenceEmailAndAddUser($last_name, $first_name, $patronymic, $email, $phone, $password)
    {
        $client = new Client();
        $data_select = $client->selectEmailUser($email);
        if (empty($data_select)) {
            $this->addingNewUser($last_name, $first_name, $patronymic, $email, $phone, $password);
        } else {
            $this->errors_register[7] = 'User with this email exists!';
        }
    }

    /**
     * @param $last_name
     * @param $first_name
     * @param $patronymic
     * @param $email
     * @param $phone
     * @param $password
     */
    private function addingNewUser($last_name, $first_name, $patronymic, $email, $phone, $password)
    {
        $obj_pass = new Password($email);
        $password = $obj_pass->hashingPassword($password);

        $client = new Client();

        $client->setLastName($last_name);
        $client->setFirstName($first_name);
        $client->setPatronymic($patronymic);
        $client->setEmail($email);
        $client->setPhone($phone);
        $client->setPassword($password);
        $client->setCreateAt('\''.date("Y-m-d H:i:s").'\'');

        $client->insert();
    }

    private function checkFieldsForEmptinessAndWriteErrors()
    {
        foreach ($_POST as $value) {
            if ($value == '' || $value == '+380 ') {
                $this->errors_register[7] = 'Empty fields form';
            } else {
                $this->errors_register[7] = '';
                break;
            }
        }

        if ($this->errors_register[7] == '') {
            if (empty($_POST['last_name'])) {
                $this->errors_register[0] = 'Please enter last name name !';
            }
            if (empty($_POST['first_name'])) {
                $this->errors_register[1] = 'Please enter first name name !';
            }
            if (empty($_POST['patronymic'])) {
                $this->errors_register[2] = 'Please enter patronymic name !';
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

    /**
     * @param $value
     * @param $piece
     */
    private function checkValidateFirstNameLastNamePatronymic($value, $piece)
    {
        if (preg_match('/[0-9]/', $value)) {
            $this->errors_register[7] = ' В имени, фамилии и отчестве не допускаются цифры';
        } else {
            if (strlen($value) > 50) {
                $this->errors_register[0] = ' Длина '.$piece.' должна быть не больше 50 символов';
            }
        }
    }

    /**
     * @param $email
     */
    private function checkValidateEmail($email)
    {
        if (!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $email)) {
            $this->errors_register[3] = 'Адрес электронной почты был введен неверно. Email может 
                                         содержать только буквы латинского алфавита и цифры, от 3 до 14 символов.
                                         Также допускается использование символов @ - _';
        }
    }

    /**
     * @param $phone
     */
    private function checkValidatePhone($phone)
    {
        if (strlen($phone) != 19) {
            $this->errors_register[4] = 'Заполните поле телефона корректно.';
        }
    }

    /**
     * @param $password
     * @param $confirm_pass
     */
    private function checkValidatePassword($password, $confirm_pass)
    {
        if (!preg_match("/^[a-z0-9_-]{6,18}$/", $password)) {
            $this->errors_register[5] = 'Пароль должен состоять из букв английского 
                                         алфавита и цифр. Также допускается использование символов - _.';
        }

        if (strlen($password) < 3 or strlen($password) > 16) {
            $this->errors_register[5] .= ' Длина должна быть не меньше 3-х символов и не больше 16';
        }

        if ($this->errors_register[5] == "") {
            if ($confirm_pass != $password) {
                $this->errors_register[6] .= 'Пароли не совпадают !';
            }
        }
    }

    /**
     * @param string $value_field
     * @return string
     */
    private function cleanFields($value_field = "")
    {
        $value_field = trim($value_field);
        $value_field = stripslashes($value_field);
        $value_field = strip_tags($value_field);
        $value_field = htmlspecialchars($value_field);

        return $value_field;
    }
}
