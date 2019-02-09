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
    private $obj;
    private $class;

    protected function setUp()
    {
        $this->obj = new SendValidate();
        $this->obj->setEmail("fhlbc2012@gmail.com");
        $this->obj->setText("Test send");

        $this->class = new \ReflectionClass(SendValidate::class);
    }

    public function testCheckSend()
    {
        $this->assertEquals($this->obj->checkSend(), '["",""]');
    }

    public function testCheckErrorsAndSendMail()
    {
        $method = $this->class->getMethod('checkErrorsAndSendMail');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj);
        $this->assertEquals(true, $result);
    }

    public function testCleanFields()
    {
        $method = $this->class->getMethod('cleanFields');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, "<a href='test'>Test</a>");
        $this->assertEquals("Test", $result);
    }
}
