<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 08.01.2019
 * Time: 14:43
 */

namespace practice\Model;

class Product extends Model
{
    public $id_product = 0;

    public function __construct()
    {
        $this->ConnectionDB();
    }

    public function select_product()
    {
        $sql_comment = ConnectionManager::ExecutionQuery("SELECT cl.first_name, com.id, com.content, date_added, com.client_id 
                                                            FROM comments com 
                                                              JOIN client cl ON cl.id = com.client_id 
                                                              JOIN product pr ON pr.id = com.product_id 
                                                            WHERE pr.id = ".$this->id_product." ORDER BY com.date_added DESC");

        $sql_product = ConnectionManager::ExecutionQuery("SELECT id, name, description, price, unit, amount FROM product WHERE id = ".$this->id_product);
        $sql_product = $this->AddSpaceToPriceProduct($sql_product, "price");
        $sql_images = ConnectionManager::ExecutionQuery("SELECT i.img FROM images i JOIN images_in_product ip ON i.id = ip.images_id JOIN product p ON p.id = ip.product_id WHERE p.id = ".$this->id_product);

        $all_info_product = array (
            'info_product' => $sql_product,
            'images' => $sql_images,
            'comments' => $sql_comment
        );

        return $all_info_product;
    }

    public function select_all($sorting = 0, $category = 0)
    {
        if($sorting == 1) {
            return ConnectionManager::ExecutionQuery("SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, (SELECT img FROM images i JOIN images_in_product ip ON ip.images_id = i.id WHERE ip.product_id = p.id LIMIT 1) as image 
                                                            FROM product p 
                                                              JOIN categories c ON c.id = p.category_id 
                                                            WHERE c.id = $category ORDER BY price DESC");
        } else if($sorting == 2) {
            return ConnectionManager::ExecutionQuery("SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, (SELECT img FROM images i JOIN images_in_product ip ON ip.images_id = i.id WHERE ip.product_id = p.id LIMIT 1) as image 
                                                            FROM product p 
                                                              JOIN categories c ON c.id = p.category_id 
                                                            WHERE c.id = $category ORDER BY price ASC");
        }

        if($category == 0) {
            return ConnectionManager::ExecutionQuery("SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, (SELECT img FROM images i 
                                                              JOIN images_in_product ip ON ip.images_id = i.id 
                                                            WHERE ip.product_id = p.id LIMIT 1) as image 
                                                            FROM product p");
        } else {
            $sql = ConnectionManager::ExecutionQuery("SELECT p.id, p.name, p.description, p.price, p.unit, p.amount, (SELECT img FROM images i 
                                                              JOIN images_in_product ip ON ip.images_id = i.id 
                                                            WHERE ip.product_id = p.id LIMIT 1) as image 
                                                            FROM product p JOIN categories c ON c.id = p.category_id WHERE c.id = ".$category);

            $sql = $this->AddSpaceToPriceProduct($sql, 'price');
            return $sql;
        }
    }

    public function CheckExistSessionAndSelectProduct($id_client)
    {
        $data = ConnectionManager::ExecutionQuery("SELECT id, name, price, unit FROM product WHERE id = ".$this->id_product);

        if(isset($_SESSION['user_id'])) {
            $sql_client = ConnectionManager::ExecutionQuery("SELECT first_name, last_name, email, phone FROM client WHERE id = ".$id_client);
            $data = array_merge((array)$data, (array)$sql_client);
        }

        $data[0]['amount'] = $_POST['amount'];
        $data[0]['total_price'] = $_POST['amount'] * $data[0]['price'];

        return $data;
    }

    public function insert(){}

    public function update(){}

    public function delete(){}
}