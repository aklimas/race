<?php

namespace Programigo;

trait ObserverTrait
{

    /**
     * @var Observer[]
     */
    private array $observers = [];
    public function addObserver(Observer $observer): void
    {
        $this->observers[] = $observer;
    }
}
