<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 28.01.2019
 * Time: 14:40
 */

namespace practice\Model;

use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    public static function setUpBeforeClass()
    {

    }

    public function testVerifyPasswords()
    {
        $obj = new Password('fhlbc2012@gmail.com');

        $this->assertTrue($obj->verifyPasswords('$2y$10$fCO2XafidboREdj96T1iUOYxn56iAAhUpmhYrLsJzDhnoBms0u7MO', 'fhlbc2012@gmail.com'));
    }

    protected function tearDown()
    {

    }
}
