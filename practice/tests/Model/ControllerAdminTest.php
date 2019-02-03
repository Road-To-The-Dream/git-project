<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 02.02.2019
 * Time: 21:42
 */

namespace practice\Model;

use PHPUnit\Framework\TestCase;
use practice\Controller\ControllerAdmin;

class ControllerAdminTest extends TestCase
{
    public function test()
    {
        $obj = new ControllerAdmin();
        $this->assertTrue($obj->product());
    }
}
