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

            $DBdata = $client->select($sorting);
            $i = 0;
            foreach ($DBdata as $price) { #change the price of 30,000 to 30 000
                $DBdata[$i]['price'] = str_replace('.', ' ', $price['price']);
                $i++;
            }

            return $DBdata;
        }

        public function get_product_id($id)
        {
            $client = new Product();
            $client->id = $id;

            $DBdata = $client->select();

            #change the price of 30,000 to 30 000
            $DBdata[0]['price'] = str_replace('.', ' ', $DBdata[0]['price']);

            return $DBdata;
        }

        public function get_products_cart(){}
    }
