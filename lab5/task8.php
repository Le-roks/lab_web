<?php
// Інтерфейс Factory
interface Factory
{
    public function getProduct();
}

// Інтерфейс Product
interface Product
{
    public function getName();
    public function getDetails();
}

// Фабрика для продуктів типу Food
class FoodFactory implements Factory
{
    public function getProduct()
    {
        return new Food("Apple", "2024-12-31", 10);
    }
}

// Фабрика для продуктів типу Drink
class DrinkFactory implements Factory
{
    public function getProduct()
    {
        return new Drink("Orange Juice", "2024-05-01", 5);
    }
}

// Фабрика для продуктів типу Stationery
class StationeryFactory implements Factory
{
    public function getProduct()
    {
        return new Stationery("Notebook", null, 50);
    }
}

// Продукт типу Food
class Food implements Product
{
    private $name;
    private $expirationDate;
    private $quantity;

    public function __construct($name, $expirationDate, $quantity)
    {
        $this->name = $name;
        $this->expirationDate = $expirationDate;
        $this->quantity = $quantity;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDetails()
    {
        return "Food: {$this->name}, Expiration Date: {$this->expirationDate}, Quantity: {$this->quantity}<br>";
    }
}

// Продукт типу Drink
class Drink implements Product
{
    private $name;
    private $expirationDate;
    private $quantity;

    public function __construct($name, $expirationDate, $quantity)
    {
        $this->name = $name;
        $this->expirationDate = $expirationDate;
        $this->quantity = $quantity;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDetails()
    {
        return "Drink: {$this->name}, Expiration Date: {$this->expirationDate}, Quantity: {$this->quantity}<br>";
    }
}

// Продукт типу Stationery
class Stationery implements Product
{
    private $name;
    private $quantity;

    public function __construct($name, $expirationDate, $quantity)
    {
        $this->name = $name;
        $this->quantity = $quantity;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDetails()
    {
        return "Stationery: {$this->name}, Quantity: {$this->quantity}<br>";
    }
}

// Використання
$foodFactory = new FoodFactory();
$food = $foodFactory->getProduct();
echo $food->getDetails();

$drinkFactory = new DrinkFactory();
$drink = $drinkFactory->getProduct();
echo $drink->getDetails();

$stationeryFactory = new StationeryFactory();
$stationery = $stationeryFactory->getProduct();
echo $stationery->getDetails();
?>