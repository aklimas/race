<?php

include_once __DIR__ . '/vendor/autoload.php';

use Programigo\Race;
use Programigo\ShinyCar;
use Programigo\Weather;
use Programigo\VehicleBuilder;

$b = new DI\ContainerBuilder();
$b->addDefinitions(
    [
        'VB' => DI\create(VehicleBuilder::class),
        'Weather' => DI\factory([Weather::class, 'getInstance']),
        'Race' => DI\create(Race::class)->constructor(DI\get('Weather'))
    ]
);
$container = $b->build();

$weather = $container->get('Weather');
$race = $container->get('Race');

$builder = $container->get('VB');


$builder->setType(VehicleBuilder::CAR);
$builder->setName('abc');
$race->addVehicle($builder->build());

$builder->setName('bac');
$race->addVehicle(new ShinyCar($builder->build()));

$builder->setType(VehicleBuilder::TRUCK);
$race->addVehicle($builder->build());

$builder->setType(VehicleBuilder::MOTOR);
$builder->setName('abc');
$race->addVehicle($builder->build());


$race->run();
