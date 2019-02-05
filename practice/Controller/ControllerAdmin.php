<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.01.2019
 * Time: 11:04
 */

namespace practice\Controller;

use practice\Controller\Services\User;
use practice\Model\ActiveRecord\Client;
use practice\Model\ActiveRecord\Product;

class ControllerAdmin extends Controller
{
    public function index($DBdata = 0, $view)
    {
        View::generate('Admin/admin', $view, $DBdata);
    }

    public function product()
    {
        switch ($_POST['btn']) {
            case 'Add':
                User::addClient();
                break;
            case 'Save':
                User::saveClient();
                break;
            default:
                $DBdata = Product::selectAllProductForAdmin();
                $this->index('product', $DBdata);
        }
    }

    public function images()
    {
        switch ($_POST['btn']) {
            case 'Add':
                User::addClient();
                break;
            case 'Save':
                User::saveClient();
                break;
            default:
                $DBdata = Product::selectAllProductForAdmin();
                $this->index('products', $DBdata);
        }
    }

    public function orders()
    {
        switch ($_POST['btn']) {
            case 'Add':
                User::addClient();
                break;
            case 'Save':
                User::saveClient();
                break;
            default:
                $DBdata = Product::selectAllProductForAdmin();
                $this->index('orders', $DBdata);
        }
    }

    public function client()
    {
        switch ($_POST['btn']) {
            case 'Add':
                User::addClient();
                break;
            case 'Save':
                User::saveClient();
                break;
            default:
                $DBdata = Client::selectAllClientForAdmin();
                $this->index('client', $DBdata);
        }
    }

    public function comments()
    {
        switch ($_POST['btn']) {
            case 'Add':
                User::addClient();
                break;
            case 'Save':
                User::saveClient();
                break;
            default:
                $DBdata = Product::selectAllProductForAdmin();
                $this->index('comments', $DBdata);
        }
    }

    public function vendor()
    {
        switch ($_POST['btn']) {
            case 'Add':
                User::addClient();
                break;
            case 'Save':
                User::saveClient();
                break;
            default:
                $DBdata = Product::selectAllProductForAdmin();
                $this->index('vendor', $DBdata);
        }
    }
}
