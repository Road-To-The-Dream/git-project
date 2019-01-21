<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 08.01.2019
 * Time: 14:14
 */

namespace practice\Model;

class Client extends Model
{
    public $last_name;
    public $first_name;
    public $patronymic;
    public $phone;
    public $email;
    public $password;
    public $role = '\''.'user'.'\'';

    public function __construct()
    {
        $this->ConnectionDB();
    }

    public function select()
    {
        $sql = "SELECT last_name, first_name, patronymic, email, phone, password, role FROM client";
        ConnectionManager::ExecutionQuery($sql);
    }

    public function insert()
    {
        $date_added = '\''.date("Y-m-d H:i:s").'\'';
        $sql = "INSERT INTO client (last_name,first_name,patronymic,email,phone,password,role,create_at) VALUES (:last_name,:first_name,:patronymic,:email,:phone,:password,$this->role,$date_added)";
        $parameters = array(
            ':last_name' => $this->last_name,
            ':first_name' => $this->first_name,
            ':patronymic' => $this->patronymic,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':password' => $this->password
        );
        ConnectionManager::ExecutionQuery($sql, $parameters);
    }

    public function updatePassword($password, $email)
    {
        $date_of_change = '\''.date("Y-m-d H:i:s").'\'';
        $sql = "UPDATE client SET password = ".'\''.$password.'\''.", update_at = ".$date_of_change." WHERE email = ".'\''.$email.'\'';
        ConnectionManager::ExecutionQuery($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM client WHERE id = ".$id;
        ConnectionManager::ExecutionQuery($sql);
    }

    public function selectEmailUser($email)
    {
        $sql = "SELECT id FROM client WHERE email = ".'\''.$email.'\'';
        return ConnectionManager::ExecutionQuery($sql);
    }

    public function selectPasswordUser($email)
    {
        $sql = "SELECT password FROM client WHERE email = ".'\''.$email.'\'';
        return ConnectionManager::ExecutionQuery($sql);
    }

    public function selectIdAndFirstNameUser($email)
    {
        $sql = "SELECT id, first_name FROM client WHERE email = ".'\''.$email.'\'';
        return ConnectionManager::ExecutionQuery($sql);
    }
}