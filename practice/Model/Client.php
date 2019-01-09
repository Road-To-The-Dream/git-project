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
    public $role = '\''.'user'.'\'';

    public function __construct()
    {
        $this->config = require 'DBconfiguration.php';
        $this->db = new ConnectionManager($this->config);
    }

    public function select(){}

    public function insert()
    {
        $query = "INSERT INTO client(last_name,first_name,patronymic,email,phone,password,role) VALUES ($this->last_name,$this->first_name,$this->patronymic,$this->email,$this->phone,$this->password,$this->role)";
        $this->db->ExecutionQuery($query);
    }

    public function update(){}

    public function delete(){}
}