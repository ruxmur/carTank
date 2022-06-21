<?php

namespace DevAidTests\Unit\Services;

use DevelopmentAid\Services\CarTank;
use PHPUnit\Framework\TestCase;

class CarTankTest extends TestCase
{

    public function testTankEmptyTrue()
    {
        $dashboad = new CarTank();
        $voltage = 2;

        self::assertTrue($dashboad->tankEmpty($voltage));
    }

    public function testTankEmptyFalse()
    {
        $dashboad = new CarTank();
        $voltage = 3;

        self::assertFalse($dashboad->tankEmpty($voltage));
    }

    public function testTankFullTrue()
    {
        $dashboad = new CarTank();
        $voltage = 7;

        self::assertTrue($dashboad->tankFull($voltage));
    }

    public function testTankFullFalse()
    {
        $dashboad = new CarTank();
        $voltage = 4;

        self::assertFalse($dashboad->tankFull($voltage));
    }

    /**
     * @dataProvider dataUnacceptedVoltages
     * @return void
     */
    public function testTankHalfFalse(int $unacceptedVoltage)
    {
        $dashboad = new CarTank();

        self::assertFalse($dashboad->tankHalf($unacceptedVoltage));
    }


    public function dataUnacceptedVoltages()
    {
        return [
            'three' => [3],
            'seven' => [7],
        ];
    }

    /**
     *
     * @dataProvider dataAcceptedVoltages
     * @return void
     */
    public function testTankHalfTrue(int $acceptedVoltage)
    {
        $dashboad = new CarTank();

        self::assertTrue($dashboad->tankHalf($acceptedVoltage));
    }

    public function dataAcceptedVoltages()
    {
        return [
            'four' => [4],
            'five' => [5],
            'six' => [6],
        ];
    }
}
