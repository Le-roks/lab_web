<?php
class Product // створюємо клас Продукт
{
    public $name; //назва
    public $storage_period; //термін зберігання продукту
    public $amount; // кількість
    private $weight = 0; // вага

    public function __construct($name = "Name", $storage_period = 0, $amount = 0)
    {
        $this->name = $name;
        $this->storage_period = $storage_period;
        $this->amount = $amount;
    }

    // метод для виводу інформації про продукт
    public function show()
    {
        echo "Назва: " . $this->name . "<br>";
        echo "Термін зберігання: " . $this->storage_period . " днів<br>";
        echo "Кількість: " . $this->amount . "<br>";
        echo "<hr>";
    }

    // метод для перевірки чи продукт знаходиться в наявності
    public function search($name)
    {
        if ($this->name == $name) {
            return true;
        } else {
            return false;
        }
    }

    // метод для знаходження терміну зберігання продукту
    public function getStoragePeriod()
    {
        return $this->storage_period;
    }

    // метод для знаходження назви продукту
    public function getName()
    {
        return $this->name;
    }

    // метод для знаходження кількості продукту
    public function getAmount()
    {
        return $this->amount;
    }
}

class ProductFactory
{
    public static function createProduct($name, $storage_period, $amount)
    {
        return new Product($name, $storage_period, $amount);
    }
}

// Створення 2 об'єктів
$product1 = ProductFactory::createProduct("Батон", 20, 20);
$product1->show();

$product3 = ProductFactory::createProduct("Чай", 90, 40);
$product3->show();

// Видалення об'єктів
unset($product1);
unset($product3);
?>