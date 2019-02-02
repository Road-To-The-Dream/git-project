<?php

namespace practice\Model;

use practice\Model\ActiveRecord\Client;
use practice\Model\ActiveRecord\Orders;

class Authentication
{
    private $client;
    private $info_client;
    private $role;

    /**
     * Authentication constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public function checkPasswordAndLoginAndStartSession($email, $password)
    {
        if ($this->checkExistenceEmailInDataBaseAndWriteRole($email)) {
            $obj_pass = new Password($email);
            if ($obj_pass->verifyPasswords($password, $email)) {
                session_start();
                $this->setValueInSession();
                return $this->role;
            }
        }
        return false;
    }

    /**
     * @param $email
     * @return bool
     */
    private function checkExistenceEmailInDataBaseAndWriteRole($email)
    {
        $this->client->setEmail("'" . $email . "'");
        $this->info_client = $this->client->selectAllClient();

        if (!empty($this->info_client[0]->getId())) {
            $this->role = $this->info_client[0]->getRole();
            return true;
        } else {
            return false;
        }
    }

    private function setValueInSession()
    {
        $_SESSION['isAuth'] = $this->info_client[0]->getFirstName();
        $_SESSION['LastName'] = $this->info_client[0]->getLastName();
        $_SESSION['Email'] = $this->info_client[0]->getEmail();
        $_SESSION['Phone'] = $this->info_client[0]->getPhone();
        $_SESSION['user_id'] = $this->info_client[0]->getId();
        $_SESSION['count_product_in_cart'] = $this->amountProductsInCart();
    }

    /**
     * @return mixed
     */
    private function amountProductsInCart()
    {
        $orders = new Orders();
        $orders->setClientId($_SESSION['user_id']);
        $amount_products = $orders->selectAmountProductsInCart();
        return $amount_products->getAmount();
    }

    public function cleanAndDestroySession()
    {
        session_start();
        session_unset();
        session_destroy();
    }
}
