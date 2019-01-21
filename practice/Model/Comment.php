<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.01.2019
 * Time: 12:28
 */

namespace practice\Model;

class Comment extends Model
{
    public $content;
    public $date_added;
    public $create_at;
    public $update_at;
    public $client_id;
    public $product_id;

    public function __construct()
    {
        $this->ConnectionDB();
    }

    public function select()
    {
    }

    public function insert()
    {
        $sql = "INSERT INTO comments (content, date_added, create_at, client_id, product_id) VALUES (:content,$this->date_added,$this->create_at, $this->client_id, $this->product_id)";
        $parameters = array(
            ':content' => $this->content
        );
        ConnectionManager::ExecutionQuery($sql, $parameters);
    }

    public function update(){}

    public function delete($id)
    {
        $sql = "DELETE FROM comments WHERE id = ".$id;
        ConnectionManager::ExecutionQuery($sql);
    }
}