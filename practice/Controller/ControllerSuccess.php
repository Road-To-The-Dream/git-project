<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 27.01.2019
 * Time: 14:51
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Orders;
use practice\Model\Model;

class ControllerSuccess extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();

        $orders = new Orders();
        $orders->selectIdOrderStatusOrdered();

        $model = new Model();
        $DBdata = $model->getData();

        $this->objectView->generate('success', $DBdata);
    }
}
