<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 08.01.2019
 * Time: 14:14
 */

namespace practice\Model\ActiveRecord;

use practice\Model\Model;
use practice\Model\ConnectionManager;

class Client extends Model
{
    private $id;
    private $last_name;
    private $first_name;
    private $patronymic;
    private $phone;
    private $email;
    private $password;
    private $role;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }

    /**
     * @param mixed $patronymic
     */
    public function setPatronymic($patronymic): void
    {
        $this->patronymic = $patronymic;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function __construct()
    {
        $this->connectionDB();
    }

    private static function addInfoInObject($info_client)
    {
        $ClientList = array();
        for ($i = 0; $i < count($info_client); $i++) {
            $objClient = new Client();
            $objClient->setId($info_client[$i]['id']);
            $objClient->setLastName($info_client[$i]['last_name']);
            $objClient->setFirstName($info_client[$i]['first_name']);
            $objClient->setPatronymic($info_client[$i]['patronymic']);
            $objClient->setEmail($info_client[$i]['email']);
            $objClient->setPhone($info_client[$i]['phone']);
            $objClient->setPassword($info_client[$i]['password']);
            $objClient->setRole($info_client[$i]['role']);
            $ClientList[$i] = $objClient;
        }

        return $ClientList;
    }

    public static function selectAllClientForAdmin()
    {
        ConnectionManager::getInstance();
        $sql = "SELECT id, last_name, first_name, patronymic, email, phone, password, role FROM client";

        $info_client = ConnectionManager::executionQuery($sql);

        return self::addInfoInObject($info_client);
    }

    public function selectAllClient()
    {
        ConnectionManager::getInstance();
        $sql = "SELECT id, last_name, first_name, patronymic, email, phone, password, role FROM client WHERE email = ".$this->getEmail();

        $info_client = ConnectionManager::executionQuery($sql);

        return self::addInfoInObject($info_client);
    }

    public function selectClient()
    {
        $sql = "SELECT first_name, last_name, email, phone FROM client WHERE id = " . $this->getId();

        $info_client = ConnectionManager::executionQuery($sql);

        $objClient = new Client();
        $objClient->setFirstName($info_client[0]['first_name']);
        $objClient->setLastName($info_client[0]['last_name']);
        $objClient->setEmail($info_client[0]['email']);
        $objClient->setPhone($info_client[0]['phone']);

        $ClientList = array();
        $ClientList[0] = $objClient;

        return $ClientList;
    }

    /**
     * @param $array_id_clients
     * @return array
     */
    public function selectFirstNameClient($array_id_clients)
    {
        $info_client = array();
        for ($i = 0; $i < count($array_id_clients); $i++) {
            $sql = "SELECT first_name FROM client WHERE id = " . $array_id_clients[$i];
            $data_first_name = ConnectionManager::executionQuery($sql);
            array_push($info_client, $data_first_name[0]['first_name']);
        }

        $firstNameClient = array();

        for ($i = 0; $i < count($info_client); $i++) {
            $objClient = new Client();
            $objClient->setFirstName($info_client[$i]);
            $firstNameClient[$i] = $objClient;
        }

        return $firstNameClient;
    }

    /**
     * @param $email
     * @return array
     */
    public function selectIdFirstNameEmailPasswordUser($email)
    {
        $sql = "SELECT id, first_name, email, password, role FROM client WHERE email = " . '\'' . $email . '\'';

        $info_client = ConnectionManager::executionQuery($sql);

        $objClient = new Client();
        $objClient->setId($info_client[0]['id']);
        $objClient->setFirstName($info_client[0]['first_name']);
        $objClient->setEmail($info_client[0]['email']);
        $objClient->setPassword($info_client[0]['password']);
        $objClient->setRole($info_client[0]['role']);

        $ClientList = array();
        $ClientList[0] = $objClient;

        return $ClientList;
    }

    public static function insertClientForAdmin()
    {
        $date = '\'' . date("Y-m-d H:i:s") . '\'';
        $sql = "INSERT INTO client (last_name,first_name,patronymic,email,phone,password,create_at) 
                VALUES (:last_name,:first_name,:patronymic,:email,:phone,:password,$date)";
        $parameters = array(
            ':last_name' => $_POST['last_name'],
            ':first_name' => $_POST['first_name'],
            ':patronymic' => $_POST['patronymic'],
            ':email' => $_POST['email'],
            ':phone' => $_POST['phone'],
            ':password' => $_POST['password']
        );
        ConnectionManager::executionQuery($sql, $parameters);
    }

    public function insert()
    {
        $sql = "INSERT INTO client (last_name,first_name,patronymic,email,phone,password,create_at) 
                VALUES (:last_name,:first_name,:patronymic,:email,:phone,:password,$this->create_at)";
        $parameters = array(
            ':last_name' => $this->last_name,
            ':first_name' => $this->first_name,
            ':patronymic' => $this->patronymic,
            ':email' => $this->email,
            ':phone' => $this->phone,
            ':password' => $this->password
        );
        ConnectionManager::executionQuery($sql, $parameters);
    }

    public static function updateClientForAdmin()
    {
        $date = '\'' . date("Y-m-d H:i:s") . '\'';
        $sql = "UPDATE client SET 
                                    last_name = '{$_POST['last_name']}', 
                                    first_name = '{$_POST['first_name']}', 
                                    patronymic = '{$_POST['patronymic']}',
                                    email = '{$_POST['email']}',
                                    phone = '{$_POST['phone']}',
                                    password = '{$_POST['password']}',
                                    role = '{$_POST['role']}',
                                    update_at = " . $date . " WHERE id = " . $_POST['id'];
        ConnectionManager::executionQuery($sql);
    }

    /**
     * @param $password
     * @param $email
     */
    public function updatePassword($password, $email)
    {
        $date_of_change = '\'' . date("Y-m-d H:i:s") . '\'';
        $sql = "UPDATE client SET password = " . '\'' . $password . '\'' . ", update_at = " . $date_of_change . " WHERE email = " . '\'' . $email . '\'';
        ConnectionManager::executionQuery($sql);
    }

    public static function deleteClientForAdmin()
    {
        $sql = "DELETE FROM client WHERE id = " . $_POST['id'];
        ConnectionManager::executionQuery($sql);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $sql = "DELETE FROM client WHERE id = " . $id;
        ConnectionManager::executionQuery($sql);
    }
}
