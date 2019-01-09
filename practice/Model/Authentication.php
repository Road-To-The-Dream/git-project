<?php

    namespace practice\Model;

    class Authentication
    {
        private $login = "fhlbc2012@gmail.com";
        private $password = 'fhlbc2012';

        function CheckPasswordAndLoginAndStartSession($login, $password)
        {
            if ($this->login == $login && $this->password == $password) {
                session_start();
                $_SESSION['isAuth'] = 'fhlbc2012@gmail.com';
                return 1;
            }
            return 0;
        }

        function CleanAndDestroySession()
        {
            session_start();
            session_unset();
            session_destroy();
        }
    }

