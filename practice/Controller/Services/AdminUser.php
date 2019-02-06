<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.02.2019
 * Time: 22:40
 */

namespace practice\Controller\Services;

use practice\Model\ActiveRecord\Client;
use practice\Model\Redirect;

class AdminUser
{
    public static function getClient()
    {
        Redirect::redirect('admin/client');
    }

    public static function addClient()
    {
        $client = new Client();

        self::setValueClient($client);

        $client->insert();
        self::getClient();
    }

    public static function saveClient()
    {
        $client = new Client();
        if (isset($_POST['checkbox'])) {
            $client->setId($_POST['id']);
            $client->delete();
        } else {
            self::setValueClient($client);
            $client->updateClientForAdmin();
        }
        self::getClient();
    }

    private static function setValueClient(object $client)
    {
        $client->setId($_POST['id']);
        $client->setLastName($_POST['last_name']);
        $client->setFirstName($_POST['first_name']);
        $client->setPatronymic($_POST['patronymic']);
        $client->setEmail($_POST['email']);
        $client->setPhone($_POST['phone']);
        $client->setPassword($_POST['password']);
        $client->setRole('\'' . $_POST['role'] . '\'');
        $client->setCreateAt('\'' . date("Y-m-d H:i:s") . '\'');
        $client->setUpdateAt('\'' . date("Y-m-d H:i:s") . '\'');

        return true;
    }
}
