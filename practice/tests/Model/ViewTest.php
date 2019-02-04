<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 04.02.2019
 * Time: 22:16
 */

namespace practice\Controller;

use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase
{
    public function testGenerate()
    {
        $obj = new View();
        $data = [
            'Data' => 'Data'
        ];
        $this->assertTrue($obj->generate('main', $data));
    }
}
