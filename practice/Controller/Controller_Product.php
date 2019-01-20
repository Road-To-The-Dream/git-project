<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 12:46
 */

namespace practice\Controller;


class Controller_Product extends Controller
{
    public function index($id = 1)
    {
        $this->checkSessionAndStart();

        $product = new \practice\Model\Product();
        $product->id_product = $id;
        $DBdata = $product->select_product();

        $this->objectView->generate('product', $DBdata);
    }
}