<?php
// Трейт для роботи з датами
trait DateTrait
{
    public function isExpired()
    {
        $today = date('Y-m-d'); // Поточна дата в форматі 'Y-m-d'

        if ($this->storage_period < $today) {
            echo "<i>Продукт прострочений.</i><br>";
        } else {
            echo "<i>Продукт придатний до використання.</i><br><hr>";
        }
    }
}

// Трейт для виведення інформації
trait Show
{
    public function show()
    {
        echo "Назва: " . $this->name . "<br>";
        echo "Термін зберігання до: " . $this->storage_period . "<br>";
        echo "Кількість: " . $this->amount . "<br>";
    }
}

class Product // створюємо клас Продукт
{
    private $name; //назва
    private $storage_period; //термін зберігання продукту
    private $amount; // кількість

    // додатковий конструктор для ініціалізації
    public function __construct($name = "Name", $storage_period = "2024-10-20", $amount = 0)
    {
        $this->name = $name;
        $this->storage_period = $storage_period;
        $this->amount = $amount;
    }

    use DateTrait, Show;

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
$product1 = new Product("Шоколад", "2024-10-20", 5);
$product1->show();
$product1->isExpired();

$product2 = new Product("Батон", "2024-10-30", 20);
$product2->show();
$product2->isExpired();

$product3 = new Product("Чай", "2024-09-20", 40);
$product3->show();
$product3->isExpired();

// Видалення об'єктів
unset($product1);
unset($product2);
unset($product3);
?>