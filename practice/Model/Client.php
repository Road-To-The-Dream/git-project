<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 08.01.2019
 * Time: 14:14
 */

namespace practice\Model;

class Client
{
    private $config = [];
    private $db;

    public $last_name;
    public $first_name;
    public $patronymic;
    public $phone;
    public $email;
    public $password;
    public $role;

    public function __construct()
    {
        $this->config = require 'DBconfiguration.php';
        $this->db = new ConnectionManager($this->config);
    }

    public function select(){}

    public function insert()
    {
        $this->db->ExecutionQuery("INSERT INTO products(name,image,price,unit) VALUES ('qwe','Image',12.999,'грн')");
    }

    public function update(){}

    public function delete(){}
}