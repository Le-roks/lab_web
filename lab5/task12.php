<?php
// Абстрактні класи продуктів
abstract class Car
{
    abstract public function getDescription();
}

abstract class Truck
{
    abstract public function getDescription();
}

abstract class Bus
{
    abstract public function getDescription();
}

// фабрика
interface VehicleFactory
{
    public function createCar(): Car;
    public function createTruck(): Truck;
    public function createBus(): Bus;
}

// Конкретна фабрика: Вітчизняна
class DomesticFactory implements VehicleFactory
{
    public function createCar(): Car
    {
        return new DomesticCar();
    }

    public function createTruck(): Truck
    {
        return new DomesticTruck();
    }

    public function createBus(): Bus
    {
        return new DomesticBus();
    }
}

// Конкретна фабрика: Зарубіжна
class ForeignFactory implements VehicleFactory
{
    public function createCar(): Car
    {
        return new ForeignCar();
    }

    public function createTruck(): Truck
    {
        return new ForeignTruck();
    }

    public function createBus(): Bus
    {
        return new ForeignBus();
    }
}

// Конкретні продукти: Вітчизняні
class DomesticCar extends Car
{
    public function getDescription()
    {
        return "Вітчизняний легковий автомобіль (марка: ЗАЗ)<br>";
    }
}

class DomesticTruck extends Truck
{
    public function getDescription()
    {
        return "Вітчизняна вантажівка (марка: КрАЗ)<br>";
    }
}

class DomesticBus extends Bus
{
    public function getDescription()
    {
        return "Вітчизняний автобус (марка: Богдан)<br>";
    }
}

// Конкретні продукти: Зарубіжні
class ForeignCar extends Car
{
    public function getDescription()
    {
        return "Зарубіжний легковий автомобіль (марка: Toyota)<br>";
    }
}

class ForeignTruck extends Truck
{
    public function getDescription()
    {
        return "Зарубіжна вантажівка (марка: Volvo)<br>";
    }
}

class ForeignBus extends Bus
{
    public function getDescription()
    {
        return "Зарубіжний автобус (марка: Mercedes-Benz)<br>";
    }
}

// Клас для створення парку
class VehiclePark
{
    private $factory;
    private $cars = [];
    private $trucks = [];
    private $buses = [];

    public function __construct(VehicleFactory $factory, int $carNum, int $truckNum, int $busNum)
    {
        $this->factory = $factory;

        // Наповнення парку
        for ($i = 0; $i < $carNum; $i++) {
            $this->cars[] = $factory->createCar();
        }
        for ($i = 0; $i < $truckNum; $i++) {
            $this->trucks[] = $factory->createTruck();
        }
        for ($i = 0; $i < $busNum; $i++) {
            $this->buses[] = $factory->createBus();
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

// Вибір фабрики
if ($config['factory'] === 'ua') {
    $factory = new DomesticFactory();
} else {
    $factory = new ForeignFactory();
}

// Створення парку
$vehiclePark = new VehiclePark($factory, $config['carNum'], $config['truckNum'], $config['busNum']);

// Відображення результатів
$vehiclePark->displayVehicles();
?>