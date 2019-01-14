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
            $price_all_products = $_POST['price_all_products'];

            if($_POST['btn_value'] == '+') {
                $amount_units++;
                $price_all_products += $total_price_product;
                $total_price_product = $amount_units * $price_product;
            } else {
                $amount_units--;
                $price_all_products -= $total_price_product;
                $total_price_product = $amount_units - $price_product;
            }

            $price[0] = $amount_units;
            $price[1] = $total_price_product;
            $price[2] = $price_all_products;

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

            $DBdata = $this->ChangePriceProduct($DBdata, 'price');

            return $DBdata;
        }

        public function GetProductId($id)
        {
            $product = new Product();
            $product->id_product = $id;

            $DBdata = $product->select();

            $DBdata = $this->ChangePriceProduct($DBdata, 'price');

            return $DBdata;
        }

        private function ChangePriceProduct($data_select, $name_column)
        {
            for($i = 0; $i < count($data_select); $i++) {
                switch (strlen($data_select[$i][$name_column])) {
                    case 4:
                        $data_select[$i][$name_column] = substr($data_select[$i][$name_column], 0, 1) . " " . substr($data_select[$i][$name_column], 1);
                        break;
                    case 5:
                        $data_select[$i][$name_column] = substr($data_select[$i][$name_column], 0, 2) . " " . substr($data_select[$i][$name_column], 2);
                        break;
                }
            }

            return $data_select;
        }

        public function GetProductCart($array_products)
        {
            $product = new Product();
            $DBdata = $product->SelectProductsForCart($array_products);

            $DBdata = $this->ChangePriceProduct($DBdata, 'price');

            return $DBdata;
        }

        public function GetTotalPriceProducts($array_products)
        {
            $product = new Product();
            $DBdata = $product->SelectTotalPriceProducts($array_products);
            $total_price_products = $this->ChangePriceProduct($DBdata, 'total_price');
            $total_price_products = $total_price_products[0]['total_price'];
            echo $total_price_products;
        }

        public function RemoveProductInCart($id)
        {
            session_start();
            if (($key = array_search($id, $_SESSION['product_id'])) !== false) {
                unset($_SESSION['product_id'][$key]);
            }
        }
    }
