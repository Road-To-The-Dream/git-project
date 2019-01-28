<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.01.2019
 * Time: 14:17
 */

namespace practice\Model;

use PHPUnit\Framework\TestCase;

class SendValidateTest extends TestCase
{
    public function testCheckSend()
    {
        $obj = new SendValidate();
        $this->assertEmpty($obj->checkSend('fhlbc2012@gmail.com', 'dd'));
    }
}
