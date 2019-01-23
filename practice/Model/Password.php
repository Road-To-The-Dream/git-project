<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 09.01.2019
 * Time: 10:35
 */

namespace practice\Model;

use practice\Model\ActiveRecord\Client;

class Password
{
    private $client;
    private $hash_password;

    /**
     * Password constructor.
     * @param $email
     */
    public function __construct($email)
    {
        $this->client = new Client();
        $this->hash_password = $this->client->selectPasswordUser($email);
    }

    /**
     * @param $password
     * @param $email
     * @return int
     */
    public function verifyPasswords($password, $email)
    {
        if (password_verify($password, $this->hash_password[0]['password'])) {
            if (password_needs_rehash($this->hash_password[0]['password'], PASSWORD_DEFAULT)) {
                $this->reHashingPassword($password);
                $this->updatePasswordInDatabase($this->hash_password, $email);
            }
            return 1;
        }
        return 0;
    }

    /**
     * @param $password
     */
    public function reHashingPassword($password)
    {
        $this->hash_password = $this->hashingPassword($password);
    }

    /**
     * @param $password
     * @return bool|string
     */
    public function hashingPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @param $password
     * @param $email
     */
    public function updatePasswordInDatabase($password, $email)
    {
        #Обновление данных в базе данных
        $this->client->updatePassword($password, $email);
    }
}
