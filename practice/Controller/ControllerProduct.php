<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 12:46
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\CharacteristicChild;
use practice\Model\ActiveRecord\CharacteristicParent;
use practice\Model\ActiveRecord\CharacteristicValue;
use practice\Model\ActiveRecord\Comment;
use practice\Model\ActiveRecord\Product;
use practice\Model\ActiveRecord\Client;
use practice\Model\ActiveRecord\Images;
use practice\Model\Redirect;

class ControllerProduct extends Controller
{
    /**
     * @param int $id
     */
    public function index($id = 1)
    {
        $this->checkValidateIdProduct($id);

        if (!$this->checkExistsIdProductInDataBase($id)) {
            Redirect::redirect('product/index/1');
        }

        $this->checkSessionAndStart();

        $data_product = $this->getProductsCatalog($id);

        $data_comments = $this->getComments($id);

        $data_client = $this->getFirstName($data_comments);

        $data_images = $this->getAllImages($id);

        $data_characteristicParent = $this->getCharacteristicParent();
        $data_characteristicChild = $this->getCharacteristicChild(count($data_characteristicParent));
        $data_characteristicValue = $this->getCharacteristicValue($id, count($data_characteristicParent));

        $DBdata = [
            'images' => $data_images,
            'product' => $data_product,
            'comments' => $data_comments,
            'client' => $data_client,
            'characteristic_parent' => $data_characteristicParent,
            'characteristic_child' => $data_characteristicChild,
            'characteristic_value' => $data_characteristicValue
        ];

        View::generate('product', $DBdata);
    }

    /**
     * @param $id
     * @return array
     */
    protected function getProductsCatalog($id)
    {
        $product = new Product();
        $product->setId($id);
        return $data_product = $product->selectProduct();
    }

    /**
     * @param $id
     * @return array
     */
    private function getComments($id)
    {
        $comments = new Comment();
        $comments->setProductId($id);
        return $data_comments = $comments->selectAllByProduct();
    }

    /**
     * @param $data_comments
     * @return array
     */
    private function getFirstName($data_comments)
    {
        $array_id_clients = array();
        for ($i = 0; $i < count($data_comments); $i++) {
            array_push($array_id_clients, $data_comments[$i]->getClientId());
        }

        $client = new Client();
        return $data_client = $client->selectFirstNameClient($array_id_clients);
    }

    /**
     * @param $id
     * @return array
     */
    private function getAllImages($id)
    {
        $images = new Images();
        $images->setProductId($id);
        return $data_images = $images->selectAll();
    }

    /**
     * @return array
     */
    private function getCharacteristicParent()
    {
        $parent = new CharacteristicParent();
        return $data_parent = $parent->selectName();
    }

    /**
     * @param $count_parent
     * @return array
     */
    private function getCharacteristicChild($count_parent)
    {
        $child = new CharacteristicChild();
        return $data_child = $child->selectName($count_parent);
    }

    /**
     * @param $id
     * @param $count_parent
     * @return array
     */
    private function getCharacteristicValue($id, $count_parent)
    {
        $value = new CharacteristicValue();
        $value->setProductId($id);
        return $data_value = $value->selectName($count_parent);
    }

    /**
     * @param $id
     * @return bool
     */
    private function checkExistsIdProductInDataBase($id)
    {
        if (Product::selectIdProduct($id)) {
            return true;
        }
        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    private function checkValidateIdProduct($id)
    {
        if (preg_match('/[A-Za-zА-Яа-я]/', $id)) {
            $id = intval($id);
            if ($id == 0) {
                Redirect::redirect('product/index/1');
            } else {
                Redirect::redirect('product/index/' . $id);
            }
        }
        return true;
    }
}
