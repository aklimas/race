<?php

namespace Programigo;

abstract class AbstractVehicle implements Observer, Vehicle
{
    protected string $name;
    protected string $type;
    protected float $maxSpeed = 0;
    protected float $distance = 0;
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function move(): void
    {
        $this->preMove();
        echo "\n Moving {$this->getType()} ({$this->getName()}) by {$this->distance}";
        $this->postMove();
    }

    public function getDistance(): float
    {
        return $this->distance;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function notify(string $event) : void
    {
        if($event === 'nextTour') {
            $this->move();
        }
    }

    protected function postMove(): void
    {
    }

    abstract public function getName(): string;

    abstract protected function preMove(): void;

}
