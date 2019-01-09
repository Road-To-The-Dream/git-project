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

    public function select()
    {
        $sql = "SELECT last_name, first_name, patronymic, email, phone, password, role FROM client";
        $this->db->ExecutionQuery($sql);
    }

    public function insert()
    {
        $date_added = '\''.date("Y-m-d H:i:s").'\'';
        $sql = "INSERT INTO client(last_name,first_name,patronymic,email,phone,password,role,create_at) VALUES ($this->last_name,$this->first_name,$this->patronymic,$this->email,$this->phone,$this->password,$this->role,$date_added)";
        $this->db->ExecutionQuery($sql);
    }

    public function updatePassword($password, $email)
    {
        $date_of_change = '\''.date("Y-m-d H:i:s").'\'';
        $sql = "UPDATE client SET password = ".'\''.$password.'\''.", update_at = ".$date_of_change." WHERE email = ".'\''.$email.'\'';
        $this->db->ExecutionQuery($sql);
    }

    public function delete(){}

    public function selectEmailUser($email)
    {
        $sql = "SELECT id FROM client WHERE email = ".'\''.$email.'\'';
        return $this->db->ExecutionQuery($sql);
    }

    public function selectPasswordUser($email)
    {
        $sql = "SELECT password FROM client WHERE email = ".'\''.$email.'\'';
        return $this->db->ExecutionQuery($sql);
    }

    public function selectFirstNameUser($email)
    {
        $sql = "SELECT first_name FROM client WHERE email = ".'\''.$email.'\'';
        return $this->db->ExecutionQuery($sql);
    }
}