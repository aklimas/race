<?php

namespace Programigo;

class Truck extends AbstractVehicle
{
    protected string $type = 'Truck';
    protected float $maxSpeed = 100;
    public function getName(): string
    {
        return strtoupper($this->name);
    }

    protected function preMove(): void
    {
        $this->distance += $this->maxSpeed * rand(80, 100) / 100;
    }

}
