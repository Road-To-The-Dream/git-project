<?php

    namespace practice\Controller;

    class Authentication
    {
        private $login = "fhlbc2012@gmail.com";
        private $password = 'fhlbc2012';

        function Authentication($login, $password)
        {
            if ($this->login == $login && $this->password == $password) {
                session_start();
                $_SESSION['isAuth'] = 'fhlbc2012@gmail.com';
                return 0;
            }
            return 1;
        }

        function logout()
        {
            session_start();
            session_unset();
            session_destroy();
        }
    }

