<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.01.2019
 * Time: 11:04
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Client;
use practice\Model\ActiveRecord\Product;
use practice\Model\ConnectionManager;

class ControllerAdmin extends Controller
{
    public function index($DBdata = 0, $view)
    {
        $this->objectView->generate('Admin/admin', $view, $DBdata);
    }

    public function product()
    {
        $DBdata = Product::selectAllProductForAdmin();
        $this->index('product', $DBdata);
    }

    public function images()
    {
        $DBdata = Product::selectAllProductForAdmin();
        $this->index('images', $DBdata);
    }

    public function orders()
    {
        $DBdata = Product::selectAllProductForAdmin();
        $this->index($DBdata);
    }

    public function client()
    {
        $DBdata = Client::selectAllClientForAdmin();
        $this->index('client', $DBdata);
    }

    public function addClient()
    {
        ConnectionManager::getInstance();
        Client::insertClientForAdmin();
        $this->client();
    }

    public function saveClient()
    {
        ConnectionManager::getInstance();
        if (isset($_POST['checkbox'])) {
            Client::deleteClientForAdmin();
        } else {
            Client::updateClientForAdmin();
        }

        $this->client();
    }

    public function comments()
    {
        $DBdata = Product::selectAllProductForAdmin();
        $this->index($DBdata);
    }

    public function vendor()
    {
        $DBdata = Product::selectAllProductForAdmin();
        $this->index($DBdata);
    }
}
