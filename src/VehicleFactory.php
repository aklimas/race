<?php

namespace Programigo;

class VehicleFactory
{
    const CAR = 'car';
    const MOTOR = 'motor';
    const TRUCK = 'truck';

    public static function factory(string $type, string $name): AbstractVehicle
    {

        $vehicle = match ($type) {
            self::CAR => new Car($name),
            self::MOTOR => new Motor($name),
            self::TRUCK => new Truck($name),
            default => throw new \Exception('Could not recognise type'),
        };

        return $vehicle;
    }
}
