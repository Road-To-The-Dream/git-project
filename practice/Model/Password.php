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
        $password = $this->client->selectIdFirstNameEmailPasswordUser($email);
        $this->hash_password = $password[0]->getPassword();
    }

    /**
     * @param $password
     * @param $email
     * @return int
     */
    public function verifyPasswords($password, $email)
    {
        if (password_verify($password, $this->hash_password)) {
            if (password_needs_rehash($this->hash_password, PASSWORD_DEFAULT)) {
                $this->reHashingPassword($password);
                $this->updatePasswordInDatabase($this->hash_password, $email);
            }
            return true;
        }
        return false;
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
        $this->client->updatePassword($password, $email);
    }
}
