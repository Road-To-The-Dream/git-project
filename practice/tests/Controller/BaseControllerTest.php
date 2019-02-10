<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 10.02.2019
 * Time: 11:40
 */

namespace practice\Controller;

use PHPUnit\Framework\TestCase;

class BaseControllerTest extends TestCase
{
    private $obj;
    private $class;

    protected function setUp()
    {
        $this->obj = new Controller();
        $this->class = new \ReflectionClass(Controller::class);
    }

    public function testGetNameProduct()
    {
        $method = $this->class->getMethod('getNameProducts');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, array(1,2,3));
        $this->assertEquals('Lenovo ThinkPad Edge E470 (20H1006YRT)', $result[0]->getName());
        $this->assertEquals('Apple MacBook Pro 15" Space Gray (MR942) 2018', $result[1]->getName());
        $this->assertEquals('Dell Latitude 5591 (N005L559115EMEA P)', $result[2]->getName());
    }

    public function testGetProducts()
    {
        $method = $this->class->getMethod('getProducts');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, 1);
        $this->assertEquals('Lenovo ThinkPad Edge E470 (20H1006YRT)', $result[0]->getName());
    }

    public function testGetImage()
    {
        $method = $this->class->getMethod('getImage');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, 1);
        $this->assertEquals('Lenovo ThinkPad Edge E470 (20H1006YRT) (1).jpg', $result->getImg());
    }
}
