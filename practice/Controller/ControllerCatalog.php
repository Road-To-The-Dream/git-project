<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 12:11
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Images;
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

        $data_products = $this->getProducts($sorting, $category);

        $data_images = $this->getImage($data_products);

        $data_vendors = $this->getVendor();

        $DBdata = [
            'products' => $data_products,
            'image' => $data_images,
            'vendors' => $data_vendors
        ];

        $this->objectView->generate('catalog', $DBdata);
    }

    private function getProducts($sorting, $category)
    {
        $products = new Product();
        return $data_products = $products->selectAll($sorting, $category);
    }

    private function getImage($data_products)
    {
        $id_products = array();
        for ($i = 0; $i < count($data_products); $i++) {
            array_push($id_products, $data_products[$i]->getId());
        }

        $image = new Images();
        $image->setProductId($id_products);
        return $data_image = $image->selectImageForProduct($id_products);
    }

    private function getVendor()
    {
        $vendor = new Vendor();
        return $data_vendor = $vendor->selectAll();
    }

    /**
     * @return null
     */
    public function filtrationProducts()
    {
        $product = new Product();
        return $product->filtration($_POST['vendor'], 1);
    }
}
