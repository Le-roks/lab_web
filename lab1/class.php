<?php
class Product // створюємо клас Продукт
{
    public $name; //назва
    public $storage_period; //термін зберігання продукту
    public $amount; // кількість

    // додатковий конструктор для ініціалізації
    public function __construct($name, $storage_period, $amount)
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

    // метод для зміни кількості продукту
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    // метод для зміни терміну зберігання
    public function setStoragePeriod($storage_period)
    {
        $this->storage_period = $storage_period;
    }

    // метод для зміни назви продукту
    public function setName($name)
    {
        $this->name = $name;
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

// Створення 3 об'єктів
$product1 = new Product("Шоколад", 30, 5);
$product1->show();

$product2 = new Product("Батон", 20, 20);
$product2->show();

$product3 = new Product("Чай", 90, 40);
$product3->show();

// Масив з 5 продуктів
$products = array();
$products[] = new Product("Молоко", 30, 5);
$products[] = new Product("Хліб", 10, 40);
$products[] = new Product("Помідор", 10, 100);
$products[] = new Product("Огурець", 10, 100);
$products[] = new Product("Печево", 90, 40);

// Виведення інформації про всі продукти
foreach ($products as $product) {
    $product->show();
}

// Пошук продукту по назві
$search_product = "Хліб";
$found = false;

foreach ($products as $product) {
    if ($product->search($search_product)) {
        echo "Продукт " . $search_product . " є в наявності.<br>";
        $found = true;
        break;
    }
}

if (!$found) {
    echo "Продукт " . $search_product . " немає в наявності.<br>";
}
?>