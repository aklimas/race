<?php

namespace Programigo;

interface Observer
{
    public function notify(string $event): void;
}
