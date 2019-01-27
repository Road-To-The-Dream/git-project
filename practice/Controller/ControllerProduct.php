<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 19.01.2019
 * Time: 12:46
 */

namespace practice\Controller;

use practice\Model\ActiveRecord\Comment;
use practice\Model\ActiveRecord\Product;
use practice\Model\ActiveRecord\Client;
use practice\Model\ActiveRecord\Images;

class ControllerProduct extends Controller
{
    /**
     * @param int $id
     */
    public function index($id = 1)
    {
        $this->checkSessionAndStart();

        $data_product = $this->getProducts($id);

        $data_comments = $this->getComments($id);

        $data_client = $this->getFirstName($data_comments);

        $data_images = $this->getAllImages($id);

        $DBdata = [
            'images' => $data_images,
            'product' => $data_product,
            'comments' => $data_comments,
            'client' => $data_client
        ];

        $this->objectView->generate('product', $DBdata);
    }

    /**
     * @param $id
     * @return array
     */
    private function getProducts($id)
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
        return $data_comments = $comments->selectAll();
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
}
