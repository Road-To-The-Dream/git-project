<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 21.01.2019
 * Time: 16:57
 */

namespace App\Helper;


class PhysicsHelper
{
    private const LIGHT_SPEED = 300000;
    private const LIMIT_PASS = 30000000;

    /**
     * @var CalcHelper
     */
    private $calc;

    /**
     * PhysicsHelper constructor.
     * @param CalcHelper $calc
     */
    public function __construct(CalcHelper $calc)
    {
        $this->calc = $calc;
    }

    /**
     * @param int $time
     * @return string
     */
    public function getLightPath(int $time): string
    {
        $calc = new CalcHelper();
        $path = $calc->multiplay($time, self::LIGHT_SPEED);

        if($path <= self::LIMIT_PASS) {
            return 'Quits close';
        }

        return 'Too far!';
    }
}