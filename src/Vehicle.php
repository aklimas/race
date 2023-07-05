<?php

namespace Programigo;

interface Vehicle extends \Programigo\Observer
{
    public function move() : void;
    public function getDistance() : float;
    public function getName() : string;
    public function getType() : string;
}
