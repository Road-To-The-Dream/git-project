<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 09.02.2019
 * Time: 08:13
 */

namespace practice\Controller;

use PHPUnit\Framework\TestCase;

class CatalogTest extends TestCase
{
    private $obj;
    private $class;

    protected function setUp()
    {
        $this->obj = new ControllerCatalog();
        $this->class = new \ReflectionClass(ControllerCatalog::class);
    }

    public function testsGetProductsCatalog()
    {
        $method = $this->class->getMethod('getProductsCatalog');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, 0, 2, 0, "");

        $this->assertEquals(4, $result[0]->getId());
        $this->assertEquals('HP EliteBook 830 G5 (3ZG02ES)', $result[0]->getName());
        $this->assertEquals('35 999', $result[0]->getPrice());
        $this->assertEquals('грн', $result[0]->getUnit());
        $this->assertEquals('15', $result[0]->getAmount());
    }

    public function testsGetVendors()
    {
        $method = $this->class->getMethod('getVendors');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj);

        $this->assertEquals('Lenovo', $result[0]->getName());
        $this->assertEquals('Asus', $result[1]->getName());
        $this->assertEquals('Apple', $result[2]->getName());
        $this->assertEquals('Dell', $result[3]->getName());
    }

    public function testsGetCategory()
    {
        $method = $this->class->getMethod('getCategory');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, 2);

        $this->assertEquals('Универсальные', $result->getName());
    }

    public function testsPagination()
    {
        $method = $this->class->getMethod('pagination');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, 2, 1, "");

        $this->assertEquals(3, $result['amountProduct']);
        $this->assertEquals(2, $result['currentPage']);
        $this->assertEquals(3, $result['offset']);
        $this->assertEquals(3, $result['pageAmount']);
    }
}
