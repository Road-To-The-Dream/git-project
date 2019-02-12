<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 12.02.2019
 * Time: 08:49
 */

namespace practice\Controller\Services;

use practice\Model\ActiveRecord\Vendor;
use practice\Model\Redirect;

class AdminVendor
{
    public static function getProduct()
    {
        Redirect::redirect('admin/vendor');
    }

    public static function addVendor()
    {
        $vendor = new Vendor();

        self::setValueVendor($vendor);

        $vendor->insert();
        self::getProduct();
    }

    public static function saveVendor()
    {
        $vendor = new Vendor();
        if (isset($_POST['checkbox'])) {
            $vendor->setId($_POST['id']);
            $vendor->delete();
        } else {
            self::setValueVendor($vendor);
            $vendor->update();
        }
        self::getProduct();
    }

    private static function setValueVendor(object $vendor)
    {
        $vendor->setId($_POST['id']);
        $vendor->setName($_POST['name']);
        $vendor->setCreateAt('\'' . date("Y-m-d H:i:s") . '\'');
        $vendor->setUpdateAt('\'' . date("Y-m-d H:i:s") . '\'');

        return true;
    }
}
