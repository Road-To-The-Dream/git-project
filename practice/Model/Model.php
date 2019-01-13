<?php

    namespace practice\Model;

    class Model
    {
        private $information_in_window = array("", "", "");

        public function CountTotalPriceProduct()
        {
            $price = array("", "", "");
            $amount_units = $_POST['amount_units'];
            $price_product = $_POST['price_product'];
            $total_price_product = $_POST['total_price_product'];
            $total_price_products = $_POST['total_price_products'];

            if($_POST['btn_value'] == '+') {
                $amount_units++;
                $total_price_products += $total_price_product;
                $total_price_product = $amount_units * $price_product;
            } else {
                $amount_units--;
                $total_price_product = 3;
                $total_price_products = 3;
            }

            $price[0] = $amount_units;
            $price[1] = $total_price_product;
            $price[2] = $total_price_products;

            echo json_encode($price);
        }

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
                $this->information_in_window[0] = "Товар уже имеется в корзине ! Перейдите в корзину для покупки.";
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

        public function GetProductCart($array_products)
        {
            $product = new Product();
            $DBdata = $product->SelectProductsForCart($array_products);

            return $DBdata;
        }

        public function GetTotalPriceProducts($array_products)
        {
            $product = new Product();
            $DBdata = $product->SelectTotalPriceProducts($array_products);
            $d = $DBdata[0]['total_price'];

            echo $d;
        }

        public function RemoveProductForCart($id)
        {
            session_start();
            if (($key = array_search($id, $_SESSION['product_id'])) !== false) {
                unset($_SESSION['product_id'][$key]);
            }
        }
    }
