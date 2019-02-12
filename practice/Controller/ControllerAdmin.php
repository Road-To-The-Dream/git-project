<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.01.2019
 * Time: 11:04
 */

namespace practice\Controller;

use practice\Controller\Services\AdminProduct;
use practice\Controller\Services\AdminUser;
use practice\Controller\Services\AdminVendor;
use practice\Model\ActiveRecord\Category;
use practice\Model\ActiveRecord\Client;
use practice\Model\ActiveRecord\Product;
use practice\Model\ActiveRecord\Vendor;

class ControllerAdmin extends Controller
{
    public function index($DBdata = 0, $view)
    {
        View::generate('Admin/admin', $view, $DBdata);
    }

    public function client()
    {
        switch ($_POST['btn']) {
            case 'Add':
                AdminUser::addClient();
                break;
            case 'Save':
                AdminUser::saveClient();
                break;
            default:
                $DBdata = Client::selectAllClientForAdmin();
                $this->index('client', $DBdata);
        }
    }

    public function product()
    {
        switch ($_POST['btn']) {
            case 'Add':
                AdminProduct::addProduct();
                break;
            case 'Save':
                AdminProduct::saveProduct();
                break;
            default:
                $data_product = Product::selectAllProductForAdmin();
                $data_vendor = $this->getVendorForProduct($data_product);
                $all_vendor = Vendor::selectAll();

                $DBdata = [
                    'product' => $data_product,
                    'vendor_product' => $data_vendor,
                    'all_vendor' => $all_vendor
                ];
                $this->index('product', $DBdata);
        }
    }

    public function vendor()
    {
        switch ($_POST['btn']) {
            case 'Add':
                AdminVendor::addVendor();
                break;
            case 'Save':
                AdminVendor::saveVendor();
                break;
            default:
                $DBdata = Vendor::selectAll();
                $this->index('vendor', $DBdata);
        }
    }

    public function images()
    {
//        switch ($_POST['btn']) {
//            case 'Add':
//                User::addClient();
//                break;
//            case 'Save':
//                User::saveClient();
//                break;
//            default:
//                $DBdata = Product::selectAllProductForAdmin();
//                $this->index('products', $DBdata);
//        }
    }

    public function orders()
    {
//        switch ($_POST['btn']) {
//            case 'Add':
//                AdminUser::addClient();
//                break;
//            case 'Save':
//                AdminUser::saveClient();
//                break;
//            default:
//                $DBdata = Client::selectAllProductForAdmin();
//                $this->index('orders', $DBdata);
//        }
    }

    public function comments()
    {
//        switch ($_POST['btn']) {
//            case 'Add':
//                User::addClient();
//                break;
//            case 'Save':
//                User::saveClient();
//                break;
//            default:
//                $DBdata = Product::selectAllProductForAdmin();
//                $this->index('comments', $DBdata);
//        }
    }

    private function getVendorForProduct($data_product)
    {
        $data_vendor = array();
        for ($i = 0; $i < count($data_product); $i++) {
            $obj = new Vendor();
            $obj->setId($data_product[$i]->getVendorId());
            $data_vendor[$i] = $obj->selectNameById();
        }

        return $data_vendor;
    }
}
