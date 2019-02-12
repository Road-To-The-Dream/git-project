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
    private const AMOUNT_PRODUCTS = 3;

    /**
     * @param int $sorting
     * @param int $category
     * @param string $vendor
     * @param $page
     */
    public function index($sorting = 0, $category = 1, $vendor = "", $page)
    {
        $this->checkSessionAndStart();

        $pagination = $this->pagination($page, $category, $vendor);

        if (!empty($vendor)) {
            $data_products = $this->getProductsCatalog($sorting, $category, $pagination['offset'], $vendor);
        } else {
            $data_products = $this->getProductsCatalog($sorting, $category, $pagination['offset']);
        }

        $data_images = $this->getImageFromProduct($data_products);

        $data_vendors = $this->getVendors();

        $data_category = $this->getCategory($category);

        $DBdata = [
            'products' => $data_products,
            'image' => $data_images,
            'vendors' => $data_vendors,
            'category' => $data_category,
            'pagination' => $pagination
        ];

        View::generate('catalog', $DBdata);
    }

    /**
     * @param $sorting
     * @param $category
     * @return array|mixed|null
     */
    private function getProductsCatalog($sorting, $category, $offset = 0, $vendor = "")
    {
        $products = new Product();
        return $data_products = $products->selectAll($sorting, $category, $vendor, self::AMOUNT_PRODUCTS, $offset);
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
        return $data_vendor = Vendor::selectAll();
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

    /**
     * @param $page
     * @param $category
     * @param $vendor
     * @return array
     */
    private function pagination($page, $category, $vendor)
    {
        $amount_product = Product::getAmountProducts($vendor, $category);

        $paginator = array();
        $paginator['amountProduct'] = self::AMOUNT_PRODUCTS;
        $paginator['currentPage'] = $page;
        $paginator['offset'] = $page * $paginator['amountProduct'] - $paginator['amountProduct'];
        $paginator['pageAmount'] = ceil($amount_product[0]['amt'] / $paginator['amountProduct']);

        return $paginator;
    }
}
