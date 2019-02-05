<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.02.2019
 * Time: 22:40
 */

namespace practice\Controller\Services;

use practice\Model\ConnectionManager;
use practice\Model\ActiveRecord\Client;
use practice\Model\Redirect;

class User
{
    public static function getClient()
    {
        Redirect::redirect('admin/client');
    }

    public static function addClient()
    {
        ConnectionManager::getInstance();
        Client::insertClientForAdmin();
        self::getClient();
    }

    public static function saveClient()
    {
        ConnectionManager::getInstance();
        if (isset($_POST['checkbox'])) {
            Client::deleteClientForAdmin();
        } else {
            Client::updateClientForAdmin();
        }
        self::getClient();
    }
}
