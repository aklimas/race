<?php

namespace Programigo;

class Car extends AbstractVehicle
{

    protected string $type = 'Car';
    protected float $maxSpeed = 180;

    public function getName(): string
    {
        return strtolower($this->name);

    }

    protected function preMove(): void
    {
        $this->distance += $this->maxSpeed * rand(70, 100) / 100;
    }

}
