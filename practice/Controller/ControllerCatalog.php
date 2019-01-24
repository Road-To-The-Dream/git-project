<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 12:11
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Product;
use practice\Model\ActiveRecord\Vendor;

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
        $product = $product->selectAll($sorting, $category);

        $vendor = new Vendor();
        $vendor = $vendor->select();

        $DBdata = array (
            'vendors' => $vendor,
            'products' => $product
        );

        $this->objectView->generate('catalog', $DBdata);
    }

    public function filtrationProducts()
    {
        $product = new Product();
        return $product->filtration($_POST['vendor'], 1);
    }
}
