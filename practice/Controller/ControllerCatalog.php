<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 12:11
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Product;

class ControllerCatalog extends Controller
{
    /**
     * @param int $sorting
     * @param string $category
     */
    public function index($sorting = 0, $category = 'all')
    {
        $this->checkSessionAndStart();

        $product = new Product();
        $DBdata = $product->selectAll($sorting, $category);

        $this->objectView->generate('catalog', $DBdata);
    }
}
