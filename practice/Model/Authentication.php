<?php

    namespace practice\Model;

    class Authentication
    {
        private $client;

        public function __construct()
        {
            $this->client = new Client();
        }

        function CheckPasswordAndLoginAndStartSession($email, $password)
        {
            if($this->CheckExistenceEmail($email)) {
                $obj_pass = new Password($email);
                if($obj_pass->VerifyPasswords($password, $email)) {
                    $first_name = $this->client->selectFirstNameUser($email);
                    session_start();
                    $_SESSION['isAuth'] = $first_name[0]['first_name'];
                    return 1;
                }
            }
            return 0;
        }

        private function CheckExistenceEmail($email)
        {
            $data_select = $this->client->selectEmailUser($email);
            if(!empty($data_select)) {
                return 1;
            } else {
                return 0;
            }
        }

        function CleanAndDestroySession()
        {
            session_start();
            session_unset();
            session_destroy();
        }
    }

