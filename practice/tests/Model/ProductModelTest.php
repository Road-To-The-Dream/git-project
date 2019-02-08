<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 06.02.2019
 * Time: 19:49
 */

namespace practice\Controller;

use PHPUnit\Framework\TestCase;
use practice\Model\ActiveRecord\Product;

class ProductModelTest extends TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Product();
        $this->obj->setId(1);
    }

    public function testGetAmountProducts()
    {
        $result = $this->obj->getAmountProducts("", 1);

        $this->assertEquals(8, $result[0]['amt']);
    }

    public function testSelectProduct()
    {
        $result = $this->obj->selectProduct();

        $this->assertEquals(1, $result[0]->getId());
        $this->assertEquals('Lenovo ThinkPad Edge E470 (20H1006YRT)', $result[0]->getName());
        $this->assertEquals('20 499', $result[0]->getPrice());
        $this->assertEquals('грн', $result[0]->getUnit());
        $this->assertEquals(1, $result[0]->getAmount());
    }

    public function testSelectName()
    {
        $result = $this->obj->selectName(array(8));

        $this->assertEquals('MSI GT75-8RF Titan (GT758RF-239UA)', $result[0]->getName());
    }

    public function testSelectPrice()
    {
        $result = $this->obj->selectPriceProduct();

        $this->assertEquals('20499', $result[0]['price']);
    }

    public function testSelectSearch()
    {
        $this->obj->setName('Lenovo ThinkPad Edge');
        $result = $this->obj->selectProductSearch();

        $this->assertEquals(1, $result[0]['id']);
        $this->assertEquals('Lenovo ThinkPad Edge E470 (20H1006YRT)', $result[0]['name']);
    }

    public function testUpdateDecreaseAmount()
    {
        $this->assertEquals(true, $this->obj->updateDecreaseAmount());
    }

    public function testUpdateIncreaseAmount()
    {
        $this->obj->setAmount(1);
        $this->obj->setUpdateAt('\'' . date("Y-m-d H:i:s") . '\'');
        $this->assertEquals(true, $this->obj->updateIncreaseAmount());
    }

    public function testDelete()
    {
        $this->assertEquals(true, $this->obj->delete());
    }
}
