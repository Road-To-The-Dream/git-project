<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 09.01.2019
 * Time: 10:35
 */

namespace practice\Model;

class Password
{
    private $client;
    private $hash_password;

    public function __construct($email)
    {#Чтение пароля из базы данных и сохранение в hash_password
        $this->client = new Client();
        $this->hash_password = $this->client->selectPasswordUser($email);
    }

    public function VerifyPasswords($password, $email)
    {
        if (password_verify($password, $this->hash_password[0]['password'])) {
            # Успех - теперь проверка пароля на необходимость повторного хеширования
            if (password_needs_rehash($this->hash_password[0]['password'], PASSWORD_DEFAULT)) {
                #Нам нужно повторно создать хеш пароля и сохранить его. Вызов setPassword
                $this->ReHashingPassword($password);
                $this->UpdatePasswordInDatabase($this->hash_password, $email);
            }
            return 1;
        }
        return 0;
    }

    public function ReHashingPassword($password)
    {
        $this->hash_password = $this->HashingPassword($password);
    }

    public function HashingPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function UpdatePasswordInDatabase($password, $email)
    {#Обновление данных в базе данных
        $this->client->updatePassword($password, $email);
    }
}