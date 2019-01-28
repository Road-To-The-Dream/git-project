<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 23.01.2019
 * Time: 15:55
 */

namespace practice\Model;

class Redirect
{
    /**
     * @param $url
     */
    public static function redirect($url)
    {
        header('Location: http://practice/' . $url);
        exit();
    }
}
