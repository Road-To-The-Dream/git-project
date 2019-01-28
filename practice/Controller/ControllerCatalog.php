<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 12:11
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Category;
use practice\Model\ActiveRecord\Images;
use practice\Model\ActiveRecord\Product;
use practice\Model\ActiveRecord\Vendor;

class ControllerCatalog extends Controller
{
    /**
     * @param int $sorting
     * @param int $category
     */
    public function index($sorting = 0, $category = 0)
    {
        $this->checkSessionAndStart();

        $data_products = $this->getProducts($sorting, $category);

        $data_images = $this->getImageFromProduct($data_products);

        $data_vendors = $this->getVendors();

        $data_category = $this->getCategory($category);

        $DBdata = [
            'products' => $data_products,
            'image' => $data_images,
            'vendors' => $data_vendors,
            'category' => $data_category
        ];

        $this->objectView->generate('catalog', $DBdata);
    }

    /**
     * @param $sorting
     * @param $category
     * @return array|mixed|null
     */
    private function getProducts($sorting, $category)
    {
        $products = new Product();
        return $data_products = $products->selectAll($sorting, $category);
    }

    /**
     * @param $data_products
     * @return array
     */
    private function getImageFromProduct($data_products)
    {
        $id_products = array();
        for ($i = 0; $i < count($data_products); $i++) {
            array_push($id_products, $data_products[$i]->getId());
        }

        $image = new Images();
        return $data_image = $image->selectAllImageForProduct($id_products);
    }

    /**
     * @return mixed
     */
    private function getVendors()
    {
        $vendor = new Vendor();
        return $data_vendor = $vendor->selectAll();
    }

    /**
     * @param $id_category
     * @return array
     */
    private function getCategory($id_category)
    {
        $category = new Category();
        $category->setId($id_category);
        return $name_category = $category->selectName();
    }

    /**
     * @return array|mixed|null
     */
    public function filtrationProducts()
    {
        $product = new Product();
        return $product->filtration($_POST['vendor'], 1);
    }
}
