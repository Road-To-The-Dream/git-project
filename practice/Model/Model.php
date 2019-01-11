<?php

    namespace practice\Model;

    class Model
    {
        private $information_in_window = array("", "", "");

        public function CheckExistArrayProductInSession()
        {
            session_start();
            if(isset($_SESSION['product_id'])) {
                $this->CheckExistProductInCartAndAdding();
            } else {
                session_destroy();
                $this->information_in_window[0] = "Для добавления товара в корзину требуется войти в аккаунт!";
                $this->information_in_window[1] = "error";
            }

            echo json_encode($this->information_in_window);
        }

        private function CheckExistProductInCartAndAdding()
        {
            if (!in_array($_POST['IDProduct'], $_SESSION['product_id'])) {
                array_push($_SESSION['product_id'], $_POST['IDProduct']);
                $this->information_in_window[0] = "Товар добавлен в корзину !";
                $this->information_in_window[1] = "success";
                $this->information_in_window[2] = count($_SESSION['product_id']);
            } else {
                $this->information_in_window[0] = "Товар уже имеется в корзине !";
                $this->information_in_window[1] = "error";
            }
        }

        public function AddingNewUser($last_name, $first_name, $patronymic, $email, $phone, $password)
        {
            $obj_pass = new Password($email);
            $password = $obj_pass->HashingPassword($password);

            $client = new Client();

            $client->last_name = '\''.$last_name.'\'';
            $client->first_name = '\''.$first_name.'\'';
            $client->patronymic = '\''.$patronymic.'\'';
            $client->email = '\''.$email.'\'';
            $client->phone = '\''.$phone.'\'';
            $client->password = '\''.$password.'\'';

            $client->insert();
        }

        public function GetAllProduct($sorting = 0)
        {
            $product = new Product();

            $DBdata = $product->select($sorting);
            $i = 0;
            foreach ($DBdata as $price) { #change the price of 30,000 to 30 000
                $DBdata[$i]['price'] = str_replace('.', ' ', $price['price']);
                $i++;
            }

            return $DBdata;
        }

        public function GetProductId($id)
        {
            $product = new Product();
            $product->id_product = $id;

            $DBdata = $product->select();

            #change the price of 30.000 to 30 000
            $DBdata[0]['price'] = str_replace('.', ' ', $DBdata[0]['price']);

            return $DBdata;
        }

        public function GetProductCart($arr_products)
        {
            $product = new Product();
            $DBdata = $product->SelectProductsForCart($arr_products);

            return $DBdata;
        }
    }
