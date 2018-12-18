<?php

    session_start();
    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("DBNAME", "guest_book");
    define("CHARSET", "utf8");
    define("SALT", "QwdEaKYgfnW");

    //$opt = array(\PDO::ATTr);

    try
    {
        $mysqli = new PDO('mysql:host=localhost;dbname=guest_book;charset=utf8', USER, PASS);
    }
    catch (Exception $ex)
    {
        die("Ошибка подключения: " . $ex->getMessage());
    }