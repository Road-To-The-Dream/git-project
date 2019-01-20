<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 12:11
 */

namespace practice\Controller;


class Controller_Catalog extends Controller
{
    public function index($sorting = 0)
    {
        $this->checkSessionAndStart();

        $product = new \practice\Model\Product();
        $DBdata = $product->select($sorting);

        $this->objectView->generate('catalog', $DBdata);
    }
}