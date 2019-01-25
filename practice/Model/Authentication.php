<?php

namespace practice\Model;

use practice\Model\ActiveRecord\Client;

class Authentication
{
    private $client;
    private $info_client;

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
                session_start();
                $_SESSION['isAuth'] = $this->info_client[0]->getFirstName();
                $_SESSION['user_id'] = $this->info_client[0]->getId();
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
        $this->info_client = $this->client->selectIdFirstNamePasswordUser($email);

        if (!empty($this->info_client[0]->getId())) {
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
