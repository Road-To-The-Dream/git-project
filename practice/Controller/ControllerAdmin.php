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

class ControllerAdmin extends Controller
{
    public function index($view, $DBdata = 0)
    {
        require_once 'View/Template/header_admin.php';
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
