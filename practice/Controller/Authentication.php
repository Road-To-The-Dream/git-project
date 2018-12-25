<?php

    namespace practice\Controller;

    class Authentication
    {
        private $login = "fhlbc2012@gmail.com";
        private $password = 123;

        function Auth($login, $password)
        {
            if ($this->login == $login && $this->password == $password) {
                session_start();
                $_SESSION['isAuth'] = 'fhlbc2012@gmail.com';
                //header('Location: http://practice/main/show_main');
            }
            else
            {
                return 1;
            }
            return 0;
        }

        function getlogin()
        {
            return $this->login;
        }

        function logout()
        {
            session_start();
            session_unset();
            session_destroy();
        }
    }

