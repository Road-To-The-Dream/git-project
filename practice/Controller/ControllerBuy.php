<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 20.01.2019
 * Time: 08:52
 */

namespace practice\Controller;

use practice\Model\Model;
use practice\Model\BuyValidation;

class ControllerBuy extends Controller
{
    public function index()
    {
        $this->checkSessionAndStart();

        $model = new Model();
        $DBdata = $model->getData('cart', $_POST['IDProduct']);

        $this->objectView->generate('buy', $DBdata);
    }

    public function validateBuy()
    {
        $objBuyValidation = new BuyValidation();
        echo $objBuyValidation->checkBuy();
    }
}
