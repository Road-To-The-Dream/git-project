<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 12:46
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Product;

class ControllerProduct extends Controller
{
    /**
     * @param int $id
     */
    public function index($id = 1)
    {
        $this->checkSessionAndStart();

        $product = new Product();
        $product->id_product = $id;
        $DBdata = $product->selectProduct();

        $this->objectView->generate('product', $DBdata);
    }
}
