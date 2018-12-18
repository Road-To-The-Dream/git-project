<?php

    function division($x, $y)
    {
        if ($y == 0)
        {
            throw new Exception('Деление на ноль.');
        }
        else
        {
            return $x/$y;
        }
    }

    try
    {
        echo division(5, 0);
    }
    catch (Exception $ex)
    {
        echo 'Выброшено исключение: ',  $ex->getMessage();
    }