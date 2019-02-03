<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.02.2019
 * Time: 21:12
 */

namespace practice\Model;

use PHPUnit\Framework\TestCase;

class AuthentificationTest extends TestCase
{
    public function testCheckPasswordAndLoginAndStartSession()
    {
        $obj = new Authentication();
        $this->assertEquals($obj->checkPasswordAndLoginAndStartSession('fhlbc2012@gmail.com', 'fhlbc2012'), 'admin');
    }
}
