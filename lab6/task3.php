<?php
// Абстрактний клас транспортного засобу
abstract class VehiclePrototype
{
    abstract public function getDescription();
    abstract public function __clone();
}

// Прототипи транспортних засобів: Вітчизняні
class DomesticCarPrototype extends VehiclePrototype
{
    public function getDescription()
    {
        return "Вітчизняний легковий автомобіль (марка: ЗАЗ)<br>";
    }

    public function __clone()
    {
    }
}

class DomesticTruckPrototype extends VehiclePrototype
{
    public function getDescription()
    {
        return "Вітчизняна вантажівка (марка: КрАЗ)<br>";
    }

    public function __clone()
    {
    }
}

class DomesticBusPrototype extends VehiclePrototype
{
    public function getDescription()
    {
        return "Вітчизняний автобус (марка: Богдан)<br>";
    }

    public function __clone()
    {
    }
}

// Прототипи транспортних засобів: Зарубіжні
class ForeignCarPrototype extends VehiclePrototype
{
    public function getDescription()
    {
        return "Зарубіжний легковий автомобіль (марка: Toyota)<br>";
    }

    public function __clone()
    {
    }
}

class ForeignTruckPrototype extends VehiclePrototype
{
    public function getDescription()
    {
        return "Зарубіжна вантажівка (марка: Volvo)<br>";
    }

    public function __clone()
    {
    }
}

class ForeignBusPrototype extends VehiclePrototype
{
    public function getDescription()
    {
        return "Зарубіжний автобус (марка: Mercedes-Benz)<br>";
    }

    public function __clone()
    {
    }
}

// Клас для створення парку
class VehiclePark
{
    private $cars = [];
    private $trucks = [];
    private $buses = [];

    public function __construct(VehiclePrototype $carPrototype, VehiclePrototype $truckPrototype, VehiclePrototype $busPrototype, int $carNum, int $truckNum, int $busNum)
    {
        // Наповнення парку за допомогою клонування
        for ($i = 0; $i < $carNum; $i++) {
            $this->cars[] = clone $carPrototype;
        }
        for ($i = 0; $i < $truckNum; $i++) {
            $this->trucks[] = clone $truckPrototype;
        }
        for ($i = 0; $i < $busNum; $i++) {
            $this->buses[] = clone $busPrototype;
        }
    }

    public function displayVehicles()
    {
        echo "=== Легкові автомобілі ===<br>";
        foreach ($this->cars as $car) {
            echo $car->getDescription();
        }

        echo "=== Вантажівки ===<br>";
        foreach ($this->trucks as $truck) {
            echo $truck->getDescription();
        }

        echo "=== Автобуси ===<br>";
        foreach ($this->buses as $bus) {
            echo $bus->getDescription();
        }
    }
}

// Конфігураційний файл
$config = [
    'factory' => 'ua', // 'ua' для вітчизняної, 'foreign' для зарубіжної
    'carNum' => 10,
    'truckNum' => 2,
    'busNum' => 4
];

// Вибір прототипів
if ($config['factory'] === 'ua') {
    $carPrototype = new DomesticCarPrototype();
    $truckPrototype = new DomesticTruckPrototype();
    $busPrototype = new DomesticBusPrototype();
} else {
    $carPrototype = new ForeignCarPrototype();
    $truckPrototype = new ForeignTruckPrototype();
    $busPrototype = new ForeignBusPrototype();
}

// Створення парку
$vehiclePark = new VehiclePark($carPrototype, $truckPrototype, $busPrototype, $config['carNum'], $config['truckNum'], $config['busNum']);

// Відображення результатів
$vehiclePark->displayVehicles();
?>