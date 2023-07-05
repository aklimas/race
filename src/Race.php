<?php

namespace Programigo;

class Race implements Observable
{
    private float $distance = 0;
    private int $maxTours = 5;
    private Weather $weather;
    /**
     * @var Vehicle[]
     */
    private $vehicle = [];

    use ObserverTrait;

    public function __construct(Weather $weather, float $distance = 5)
    {
        $this->weather = $weather;
        $this->distance = $distance;
    }

    public function run() : void
    {
        $this->displayInfo();

        foreach (range(1, $this->maxTours) as $tour) {
            $this->tour($tour);
        }

        $this->displayWinners();

    }

    public function addVehicle(Vehicle $vehicle): void
    {
        $this->addObserver($vehicle);
        $this->vehicle[] = $vehicle;
    }


    /**
     * @param Vehicle $vehicle
     * @return bool
     */
    public function isWinner(array $winners, Vehicle $vehicle): bool
    {
        $category = $vehicle->getType();
        if (!isset($winners[$category])) {
            return true;
        } else {
            if ($vehicle->getDistance() > $winners[$category]->getDistance()) {
                return true;
            }
        }
        return false;
    }

    private function displayInfo(): void
    {
        echo "\n Distance: \t {$this->distance}";
        echo sprintf("\n Vihicle: \t %s \n", count($this->vehicle));
    }

    private function displayTourInfo(int $tour): void
    {
        echo "\n Tour {$tour} began: ";
        echo "\n {$this->weather} ";
    }

    /**
     * @param mixed $tour
     * @return void
     */
    private function tour(mixed $tour): void
    {
        $this->weather->randomiseWeather();
        $this->displayTourInfo($tour);

        foreach ($this->observers as $observer) {
            $observer->notify('nextTour');
        }

    }

    private function displayWinners(): void
    {
        $winners = $this->getWinners();
        echo "\n WINNERS: ";
        foreach ($winners as $category => $winner) {
            echo sprintf("\n Category: %s (%s) - %d", $category, $winner->getName(), $winner->getDistance());
        }
    }

    private function getWinners(): array
    {
        $winners = [];
        foreach ($this->vehicle as $vehicle) {
            $category = $vehicle->getType();
            if($this->isWinner($winners, $vehicle)) {
                $winners[$category] = $vehicle;
            }
        }
        return $winners;
    }

}
