<?php

namespace Programigo;

class VehicleBuilder
{

    const CAR = VehicleFactory::CAR;
    const MOTOR = VehicleFactory::MOTOR;
    const TRUCK = VehicleFactory::TRUCK;

    private string $name;
    private string $type;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @throws \Exception
     */
    public function build(): Vehicle
    {
        return match ($this->type) {
            self::CAR, self::MOTOR, self::TRUCK => VehicleFactory::factory($this->type, $this->name),
            default => throw new \Exception('Not recognise type'),
        };
    }
}
