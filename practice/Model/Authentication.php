<?php

namespace practice\Model;

use practice\Model\ActiveRecord\Client;

class Authentication
{
    private $client;

    /**
     * Authentication constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param $email
     * @param $password
     * @return int
     */
    public function checkPasswordAndLoginAndStartSession($email, $password)
    {
        if ($this->checkExistenceEmailInDataBase($email)) {
            $obj_pass = new Password($email);
            if ($obj_pass->verifyPasswords($password, $email)) {
                $first_name = $this->client->selectIdAndFirstNameUser($email);
                session_start();
                $_SESSION['isAuth'] = $first_name[0]['first_name'];
                $_SESSION['user_id'] = $first_name[0]['id'];
                return 1;
            }
        }
        return 0;
    }

    /**
     * @param $email
     * @return int
     */
    private function checkExistenceEmailInDataBase($email)
    {
        $data_select = $this->client->selectEmailUser($email);
        if (!empty($data_select)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cleanAndDestroySession()
    {
        session_start();
        session_unset();
        session_destroy();
    }
}
