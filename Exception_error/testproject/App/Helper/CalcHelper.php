<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.01.2019
 * Time: 15:29
 */

namespace App\Helper;

use InvalidArgumentException;

class CalcHelper
{
    public function multiplay(int $a, int $b) : int
    {
        return $a*$b;
    }

    public function division(int $a, int $b) : float
    {
        if($b==0) {
            throw new InvalidArgumentException('Division by zero is forbidden');
        }
        return $a/$b;
    }
}
