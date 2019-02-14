<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 14.02.2019
 * Time: 07:55
 */

namespace practice\Controller;

use PHPUnit\Framework\TestCase;

class ControllerProductTest extends TestCase
{
    private $obj;
    private $class;

    protected function setUp()
    {
        $this->obj = new ControllerProduct();
        $this->class = new \ReflectionClass(ControllerProduct::class);
    }

    public function testCheckExistsIdProductInDataBase()
    {
        $method = $this->class->getMethod('checkExistsIdProductInDataBase');
        $method->setAccessible(true);

        $this->assertTrue($method->invoke($this->obj, 1));
    }

    public function testCheckValidateIdProduct()
    {
        $method = $this->class->getMethod('checkValidateIdProduct');
        $method->setAccessible(true);

        $this->assertTrue($method->invoke($this->obj, '2fwegwe'));
    }

    public function testGetCharacteristicValue()
    {
        $method = $this->class->getMethod('getCharacteristicValue');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, 1, 1);

        $this->assertEquals('ноутбук', $result[1][0]->getValue());
        $this->assertEquals('AMD A8 / 2 ГГц / 4 Гб / 500 Гб / DVD', $result[1][1]->getValue());
        $this->assertEquals('16', $result[1][2]->getValue());
    }

    public function testGetCharacteristicChild()
    {
        $method = $this->class->getMethod('getCharacteristicChild');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, 1);

        $this->assertEquals('Тип', $result[1][0]->getName());
        $this->assertEquals('Тип.конфиг.', $result[1][1]->getName());
        $this->assertEquals('Макс. объем оперативной памяти', $result[1][2]->getName());
    }

    public function testGetCharacteristicParent()
    {
        $method = $this->class->getMethod('getCharacteristicParent');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj);

        $this->assertEquals('Система', $result[0]->getName());
        $this->assertEquals('Экран', $result[1]->getName());
        $this->assertEquals('Подключение и интерфейсы', $result[2]->getName());
        $this->assertEquals('Хранение данных', $result[3]->getName());
        $this->assertEquals('Питание', $result[4]->getName());
        $this->assertEquals('Корпус', $result[5]->getName());
    }

    public function testGetAllImages()
    {
        $method = $this->class->getMethod('getAllImages');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, 1);

        $this->assertEquals('Lenovo ThinkPad Edge E470 (20H1006YRT) (1).jpg', $result[0]->getImg());
        $this->assertEquals('Lenovo ThinkPad Edge E470 (20H1006YRT) (2).jpg', $result[1]->getImg());
        $this->assertEquals('Lenovo ThinkPad Edge E470 (20H1006YRT) (3).jpg', $result[2]->getImg());
    }

    public function testGetComments()
    {
        $method = $this->class->getMethod('getComments');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, 2);

        $this->assertEquals(19, $result[0]->getId());
        $this->assertEquals('Комментарий', $result[0]->getContent());
        $this->assertEquals('2019-01-28 20:16:25', $result[0]->getDateAdded());
    }

    public function testGetInfoProduct()
    {
        $method = $this->class->getMethod('getInfoProduct');
        $method->setAccessible(true);

        $result = $method->invoke($this->obj, 1);

        $this->assertEquals(1, $result[0]->getId());
        $this->assertEquals('Lenovo ThinkPad Edge E470 (20H1006YRT)', $result[0]->getName());
        $this->assertEquals('20 499', $result[0]->getPrice());
        $this->assertEquals('грн', $result[0]->getUnit());
        $this->assertEquals(1, $result[0]->getAmount());
    }
}
