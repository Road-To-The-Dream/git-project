<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 09.02.2019
 * Time: 13:02
 */

namespace practice\Model\ActiveRecord;

use PHPUnit\Framework\TestCase;

class VendorTest extends TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Vendor();
        $this->obj->setId(1);
    }

    public function testSelectAll()
    {
        $result = $this->obj->SelectAll();

        $this->assertEquals('Lenovo', $result[0]->getName());
        $this->assertEquals('Asus', $result[1]->getName());
        $this->assertEquals('Apple', $result[2]->getName());
    }

    public function testSelectNameById()
    {
        $result = $this->obj->SelectNameById();
        $this->assertEquals('Lenovo', $result->getName());
    }

    public function testInsert()
    {
        $this->obj->setName('Test');
        $this->obj->setCreateAt('\'' . date("Y-m-d H:i:s") . '\'');
        $this->assertTrue($this->obj->insert());
    }

    public function testUpdate()
    {
        $this->obj->setName('Lenovo');
        $this->obj->setUpdateAt('\'' . date("Y-m-d H:i:s") . '\'');
        $this->assertTrue($this->obj->update());
    }

    public function testDelete()
    {
        $this->assertTrue($this->obj->delete());
    }
}
