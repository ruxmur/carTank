<?php

namespace DevelopmentAid\Services;

class Dashboard
{
   public function __construct(private CarTank $carTank) {
   }

    public function displayTankValue($voltage): string
    {
        switch ($voltage) {
            case $this->carTank->tankEmpty($voltage):
                return 'Tank Empty';
            case $this->carTank->tankHalf($voltage):
                return 'Tank Half';
            case $this->carTank->tankFull($voltage):
                return 'Tank Full';
            default:
                return 'Error';
        }

//        return match ($voltage) {
//            $this->carTank->tankEmpty($voltage) => 'Tank Empty',
//            $this->carTank->tankHalf($voltage)=> 'Tank Half',
//            $this->carTank->tankFull($voltage) => 'Tank Full',
//        };
    }
}
