<?php
// Абстрактний клас Vehicle
class Vehicle
{
    protected $country;
    protected $brand;
    protected $year;

    public function __construct($country, $brand, $year)
    {
        $this->country = $country;
        $this->brand = $brand;
        $this->year = $year;
    }

    // Абстрактний метод для отримання інформації
    public function getInfo()
    {
        return "Country: {$this->country}, Brand: {$this->brand}, Year: {$this->year}";
    }
}

// Клас Автомобіль
class Car extends Vehicle
{
    private $engine;
    private $power;
    private $color;

    public function __construct($country, $brand, $year, $engine, $power, $color)
    {
        parent::__construct($country, $brand, $year);
        $this->engine = $engine;
        $this->power = $power;
        $this->color = $color;
    }

    public function getInfo()
    {
        return "<b>Car</b>: " . parent::getInfo() . ", Engine: {$this->engine}, Power: {$this->power} HP, Color: {$this->color}";
    }
}

// Клас Велосипед
class Bike extends Vehicle
{
    private $weight;
    private $type;
    private $wheelDiameter;

    public function __construct($country, $brand, $year, $weight, $type, $wheelDiameter)
    {
        parent::__construct($country, $brand, $year);
        $this->weight = $weight;
        $this->type = $type;
        $this->wheelDiameter = $wheelDiameter;
    }

    public function getInfo()
    {
        return "<b>Bike</b>: " . parent::getInfo() . ", Weight: {$this->weight} kg, Type: {$this->type}, Wheel Diameter: {$this->wheelDiameter} inches";
    }
}

// Клас Мотоцикл
class Motorcycle extends Vehicle
{
    private $engine;
    private $color;
    private $type;

    public function __construct($country, $brand, $year, $engine, $color, $type)
    {
        parent::__construct($country, $brand, $year);
        $this->engine = $engine;
        $this->color = $color;
        $this->type = $type;
    }

    public function getInfo()
    {
        return "<b>Motorcycle</b>: " . parent::getInfo() . ", Engine: {$this->engine}, Color: {$this->color}, Type: {$this->type}";
    }
}

// Фабрика для створення транспортних засобів
class VehicleFactory
{
    public static function createVehicle($type, ...$params)
    {
        switch ($type) {
            case 'Car':
                return new Car(...$params);
            case 'Bike':
                return new Bike(...$params);
            case 'Motorcycle':
                return new Motorcycle(...$params);
            default:
                throw new Exception("Factory cannot create this type of vehicle: {$type}");
        }
    }
}

// Тестування фабрики
try {
    $car = VehicleFactory::createVehicle('Car', 'Japan', 'Toyota', 2020, 'V6', 300, 'Red');
    echo $car->getInfo() . "<br>";

    $bike = VehicleFactory::createVehicle('Bike', 'USA', 'Giant', 2021, 15, 'Mountain', 26);
    echo $bike->getInfo() . "<br>";

    $motorcycle = VehicleFactory::createVehicle('Motorcycle', 'Germany', 'BMW', 2022, '1000cc', 'Black', 'Sport');
    echo $motorcycle->getInfo() . "<br>";

    // Спроба створити невідомий транспортний засіб
    $plane = VehicleFactory::createVehicle('Plane', 'USA', 'Boeing', 2020);
} catch (Exception $e) {
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
?>