<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 09.02.2019
 * Time: 12:43
 */

namespace practice\Controller;

use PHPUnit\Framework\TestCase;

class ControllerBuyTest extends TestCase
{
    public function testValidateBuy()
    {
        $obj = new ControllerBuy();
        $this->assertNull($obj->validateBuy());
    }
}
