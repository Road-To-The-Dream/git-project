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
    public function testVerifyPasswords()
    {
        $obj = new Password('fhlbc2012@gmail.com');
        $this->assertTrue($obj->verifyPasswords('fhlbc2012', '$2y$10$.IFifnamxVMSsSbDlSPsyO6Lg0PccwO9rBFIwXIBMCt5ZErA/TxHu'));
    }
}
