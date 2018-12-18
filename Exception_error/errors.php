<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // задаём обработчик ошибок
    set_error_handler('errorHandler');

    // регистрируем функцию, которая выполнится в конце скрипта
    register_shutdown_function('in_the_end');

    // функция обработки ошибок
    function errorHandler($errnum, $errorstr, $file, $line)
    {
        showError($errnum, $errorstr, $file, $line);
        return true;
    }

    function showError($errnum, $errorstr, $file, $line)
    {
        $errormsg = PHP_EOL.'Номер ошибки: '.$errnum.PHP_EOL.
             'Название ошибки: '.$errorstr.PHP_EOL.
             'Файл с ошибкой: '.$file.PHP_EOL.
             'Строка с ошибкой: '.$line.PHP_EOL;

        error_log ($errormsg); // запись в лог файл
    }

    // функция в конце скрипта
    function in_the_end()
    {
        echo 'Ошибки залогированы!<br>Конец скрипта!<br>Path: ';
        echo ini_get('error_log');
    }

    trigger_error('E_USER_NOTICE', E_USER_NOTICE);
    trigger_error('E_USER_WARNING', E_USER_WARNING);
    trigger_error('E_USER_ERROR', E_USER_ERROR);
    echo $as;