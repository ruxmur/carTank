<?php

namespace DevAidTests\Unit\Services;

use DevelopmentAid\Services\Dashboard;
use PHPUnit\Framework\TestCase;

class DashboardTest extends TestCase
{

    public function testTankEmptyTrue()
    {
        $dashboad = new Dashboard();
        $voltage = 2;

        self::assertTrue($dashboad->tankEmpty($voltage));
    }

    public function testTankEmptyFalse()
    {
        $dashboad = new Dashboard();
        $voltage = 3;

        self::assertFalse($dashboad->tankEmpty($voltage));
    }

    public function testTankFullTrue()
    {
        $dashboad = new Dashboard();
        $voltage = 7;

        self::assertTrue($dashboad->tankFull($voltage));
    }

    public function testTankFullFalse()
    {
        $dashboad = new Dashboard();
        $voltage = 4;

        self::assertFalse($dashboad->tankFull($voltage));
    }

    /**
     * @dataProvider dataUnacceptedVoltages
     * @return void
     */
    public function testTankHalfFalse(int $unacceptedVoltage)
    {
        $dashboad = new Dashboard();

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
        $dashboad = new Dashboard();

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

    /**
     * @dataProvider dataProviderForStrings
     * @return void
     */
    public function testDisplayTankValue(string $representation, int $voltage)
    {
        $dashboad = new Dashboard();

        self::assertSame(
            $representation,
            $dashboad->displayTankValue($voltage)
        );
    }

    public function dataProviderForStrings()
    {
        return [
            'tank_empty' => [
                'representation' => 'Tank Empty',
                'voltage' => 2
            ],
            'tank_half' => [
                'representation' => 'Tank Half',
                'voltage' => 4
            ],
            'tank_full' => [
                'representation' => 'Tank Full',
                'voltage' => 7
            ],
        ];
    }
}
