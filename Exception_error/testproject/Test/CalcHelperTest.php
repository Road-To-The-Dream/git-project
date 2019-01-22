<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.01.2019
 * Time: 16:17
 */

namespace App\Helper\CalcHelper;

use App\Helper\CalcHelper;

use PHPUnit\Framework\TestCase;

class CalcHelperTest extends TestCase
{
    /**
     * @var CalcHelper
     */
    public $calc;

    public function setUp()
    {
        $this->calc = new CalcHelper();
    }

    /**
     * @dataProvider multiProvider
     */
    public function testMultiplyIsCorrect($a, $b, $expected): void
    {
        $result = $this->calc->multiplay($a, $b);
        $this->assertEquals($expected, $result);
    }

    public function testDevideIsCorrect(): void
    {
        $result = $this->calc->division(2, 1);
        $this->assertEquals(2, $result);
    }

    public function testDevideByZero(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->calc->division(2, 0);
    }

    public function multiProvider(): array
    {
        return [
            [1,2,2],
            [4,5,12],
            [3,5,15],
        ];
    }
}