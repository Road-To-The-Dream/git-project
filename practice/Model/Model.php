<?php

    namespace practice\Model;

    class Model
    {
        public function add_user($patronymic, $last_name, $first_name, $phone, $email, $password)
        {
            $client = new Client();

            $client->last_name = $last_name;
            $client->first_name = $first_name;
            $client->patronymic = $patronymic;
            $client->phone = $phone;
            $client->email = $email;
            $client->password = $password;

            $client->insert();
        }

        public function get_all_info($sorting = 0)
        {
            $client = new Product();
            return $client->select($sorting);
        }

        public function get_product_id($id)
        {
            $client = new Product();
            $client->id = $id;
            return $client->select();
        }

        public function get_products_cart(){}
    }
