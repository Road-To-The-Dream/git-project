<?php

    // регистрируем функцию, которая выполнится в конце скрипта
    register_shutdown_function('in_the_end');

    set_exception_handler('exceptionHandler');

    // функция обработки ошибок
    function exceptionHandler(\Exception $ex)
    {
        showError(get_class($ex), $ex->getMessage(), $ex->getFile(), $ex->getLine());
        return true;
    }

    function showError($errnum, $errorstr, $file, $line)
    {
        echo $errormsg = PHP_EOL.'Класс исключения: '.$errnum.PHP_EOL.
            'Название исключения: '.$errorstr.PHP_EOL.
            'Файл с исключением: '.$file.PHP_EOL.
            'Строка с исключением: '.$line.PHP_EOL;

        error_log ($errormsg); // запись в лог файл
    }

    // функция в конце скрипта
    function in_the_end()
    {
        echo 'Исключение залогировано!<br>Конец скрипта!<br>Path: ';
        echo ini_get('error_log');
    }

    //throw new \InvalidArgumentException('Сгенерированное исключение!');
    //throw new \DomainException('Исключение DomainException');
    //throw new \BadFunctionCallException('Исключение BadFunctionCallException');
