<?php

    namespace practice\Model;

    class Model
    {
        public function AddProductInCart()
        {
            array_push($_SESSION['product_id'], $_POST['IDProduct']);
        }

        public function add_user($last_name, $first_name, $patronymic, $email, $phone, $password)
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

        public function get_all_info($sorting = 0)
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

        public function get_product_id($id)
        {
            $product = new Product();
            $product->id = $id;

            $DBdata = $product->select();

            #change the price of 30,000 to 30 000
            $DBdata[0]['price'] = str_replace('.', ' ', $DBdata[0]['price']);

            return $DBdata;
        }
    }
