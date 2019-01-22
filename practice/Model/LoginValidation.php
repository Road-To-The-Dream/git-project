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

    /**
     * @return string
     */
    public function checkLogin()
    {
        $count_empty_errors = 0;
        $this->checkFieldsForEmptinessAndWriteErrors();

        foreach ($this->errors_login as $value) {
            if ($value != "") {
                $count_empty_errors++;
            }
        }

        if ($count_empty_errors == 0) {
            $email = $this->cleanFields($_POST['email_login']);
            $password = $this->cleanFields($_POST['password_login']);

            $this->checkLoginAndPasswordInDatabase($email, $password);
        }

        return json_encode($this->errors_login);
    }

    /**
     * @param $email
     * @param $password
     */
    private function checkLoginAndPasswordInDatabase($email, $password)
    {
        $auth = new Authentication();
        if (!$auth->checkPasswordAndLoginAndStartSession($email, $password)) {
            $this->errors_login[2] = 'Invalid password or login';
        }
    }

    private function checkFieldsForEmptinessAndWriteErrors()
    {
        if (empty($_POST['email_login']) && empty($_POST['password_login'])) {
            $this->errors_login[2] = 'Empty fields form';
        } else {
            if (empty($_POST['email_login'])) {
                $this->errors_login[0] = 'Please enter email !';
            }
            if (empty($_POST['password_login'])) {
                $this->errors_login[1] = 'Please enter password !';
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
