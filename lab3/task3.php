<?php
// Батьківський абстрактний клас Product
abstract class Product
{
    protected $name;            // Назва продукту
    protected $amount;          // Кількість

    public function __construct($name, $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
    }

    // Абстрактний метод для виведення інформації про продукт
    abstract public function show();
}

// Дочірній клас для харчових продуктів
class Food extends Product
{
    protected $storage_period;  // Термін зберігання

    public function __construct($name, $amount, $storage_period)
    {
        parent::__construct($name, $storage_period, $amount);
        $this->storage_period = $storage_period;
    }

    // Реалізація методу show() для харчових продуктів
    public function show()
    {
        echo "Назва: {$this->name}<br>";
        echo "Термін зберігання: {$this->storage_period} днів<br>";
        echo "Кількість: {$this->amount}<br>";
        echo "<hr>";
    }
}

// Дочірній клас для нехарчових продуктів
class NonFood extends Product
{
    private $category; // Категорія нехарчового продукту

    public function __construct($name, $amount, $category)
    {
        parent::__construct($name, $amount);
        $this->category = $category;
    }

    // Реалізація методу show() для нехарчових продуктів
    public function show()
    {
        echo "Назва: {$this->name}<br>";
        echo "Категорія: {$this->category}<br>";
        echo "Кількість: {$this->amount}<br>";
        echo "<hr>";
    }
}

// Приклади створення об'єктів та виклик методу show()
$food1 = new Food("Яблука", 10, 50);
$food1->show();

$nonFood1 = new NonFood("Шампунь", 730, "Гігієна");
$nonFood1->show();
?>