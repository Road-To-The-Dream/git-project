<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 16.01.2019
 * Time: 12:28
 */

namespace practice\Model;

class Comment
{
    private $config = [];
    private $db;

    public $content;
    public $date_added;
    public $create_at;
    public $update_at;
    public $client_id;
    public $product_id;

    public function __construct()
    {
        $this->config = require 'DBconfiguration.php';
        $this->db = new ConnectionManager($this->config);
    }

    public function select()
    {
    }

    public function insert()
    {
        $sql = "INSERT INTO comments (content, date_added, create_at, client_id, product_id) VALUES ($this->content, $this->date_added, $this->create_at, $this->client_id, $this->product_id)";
        $this->db->ExecutionQuery($sql);
    }

    public function update(){}

    public function delete($id)
    {
        $sql = "DELETE FROM comments WHERE id = ".$id;
        $this->db->ExecutionQuery($sql);
    }
}