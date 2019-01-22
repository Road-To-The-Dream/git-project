<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.01.2019
 * Time: 17:08
 */

use \App\Helper\CalcHelper;
use App\Helper\PhysicsHelper;
use PHPUnit\Framework\TestCase;

class PhysicsHelperTest extends TestCase
{
    public function testLightPathMessageIsCorrect(): void
    {
        $calc = $this->createMock(CalcHelper::class);

        $this->assertInstanceOf(CalcHelper::class, $calc);

        $map = [
          [10, 300000, 30000000],
          [1000, 300000, 300000000]
        ];

        $calc->method('multiply')->will($this->returnValueMap($map));

        $physics = new PhysicsHelper(new CalcHelper());

        $this->assertEquals('Quite close', $physics->getLightPath(10));
        $this->assertEquals('Too far', $physics->getLightPath(1000));
    }
}