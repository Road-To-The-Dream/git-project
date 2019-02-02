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
     * @param string $vendor
     */
    public function index($sorting = 0, $category = 1, $vendor = "")
    {
        $this->checkSessionAndStart();

        if (!empty($vendor)) {
            $data_products = $this->getProductsCatalog($sorting, $category, $vendor);
        } else {
            $data_products = $this->getProductsCatalog($sorting, $category);
        }

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
    private function getProductsCatalog($sorting, $category, $vendor = "")
    {
        $products = new Product();
        return $data_products = $products->selectAll($sorting, $category, $vendor);
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
     * @return Category
     */
    private function getCategory($id_category)
    {
        $category = new Category();
        $category->setId($id_category);
        return $name_category = $category->selectName();
    }
}
