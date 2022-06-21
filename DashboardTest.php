<?php

namespace DevAidTests\Unit\Services;

use DevelopmentAid\Services\CarTank;
use DevelopmentAid\Services\Dashboard;
use PHPUnit\Framework\TestCase;

class DashboardTest extends TestCase
{
    /**
     * @return void
     */
    public function testDisplayTankValueWhenEmpty()
    {
        $voltage = 2;
        $carTankMock = $this->createMock(CarTank::class);
        $carTankMock->expects(self::once())
            ->method('tankEmpty')
            ->with($voltage)
            ->willReturn(true);

        $carTankMock->expects(self::once())
            ->method('tankHalf')
            ->with($voltage)
            ->willReturn(false);

        $carTankMock->expects(self::once())
            ->method('tankFull')
            ->with($voltage)
            ->willReturn(false);

        $dashboard = new Dashboard($carTankMock);

        self::assertSame(
            'Tank Empty',
            $dashboard->displayTankValue($voltage)
        );
    }

    /**
     * @return void
     */
    public function testDisplayTankValueWhenHalf()
    {
        $voltage = 4;
        $carTankMock = $this->createMock(CarTank::class);

        $carTankMock->expects(self::once())
            ->method('tankHalf')
            ->with($voltage)
            ->willReturn(true);

        $dashboard = new Dashboard($carTankMock);

        self::assertSame(
            'Tank Half',
            $dashboard->displayTankValue($voltage)
        );
    }

    /**
     * @return void
     */
    public function testDisplayTankValueWhenFull()
    {
        $carTankMock = $this->createMock(CarTank::class);

        $voltage = 7;
        $carTankMock->expects(self::once())
            ->method('tankFull')
            ->with($voltage)
            ->willReturn(true);

        $dashboard = new Dashboard($carTankMock);

        self::assertSame(
            'Tank Full',
            $dashboard->displayTankValue($voltage)
        );
    }

    public function testNew()
    {
        return 'asdsad';
    }
}
