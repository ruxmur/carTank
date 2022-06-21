<?php

namespace DevelopmentAid\Services;

class CarTank
{
    /**
     * <3V empty
     * @param int $voltage
     *
     * @return void
     */
    public function tankEmpty(int $voltage): bool
    {
        return $voltage < 3;
    }

    /**
     * ==7V is full
     *
     * @param int $voltage
     *
     * @return void
     */
    public function tankFull(int $voltage): bool
    {
        return $voltage == 7;
    }

    /**
     *
     * >3V <7V half
     * @param int $voltage
     *
     * @return void
     */
    public function tankHalf(int $voltage): bool
    {
        return $voltage > 3 && $voltage < 7;
    }
}
