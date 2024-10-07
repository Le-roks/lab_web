<?php
class Product // створюємо клас Продукт
{
    public $name; //назва
    public $storage_period; //термін зберігання продукту
    public $amount; // кількість
    private $weight = 0; // вага

    // додатковий конструктор для ініціалізації
    public function __construct($name = "Name", $storage_period = 0, $amount = 0)
    {
        $this->name = $name;
        $this->storage_period = $storage_period;
        $this->amount = $amount;
    }

    // додатковий конструктор для ініціалізації
    public function __construct2($weight)
    {
        $this->weight = $weight;
    }


    // метод для виводу інформації про продукт
    public function show()
    {
        $this->show_name();
        $this->show_storage_period();
        $this->show_amount();
        echo "<hr>";
    }

    // метод для виводу інформації про масив продуктів
    public function show_object(array $products)
    {
        foreach ($products as $product) {
            $product->show();
        }
    }

    // метод для виводу інформації про назву продукту
    public function show_name()
    {
        echo "Назва: " . $this->name . "<br>";
    }

    // метод для виводу інформації про термін придатності продукту
    public function show_storage_period()
    {
        echo "Термін зберігання: " . $this->storage_period . " днів<br>";
    }

    // метод для виводу інформації про кількість продуктів
    public function show_amount()
    {
        echo "Кількість: " . $this->amount . "<br>";
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

    // метод для виклику приватного методу
    private function prMethode()
    {
        echo "<i>Привіт, я приватний метод!</i><br>";
    }

    // публічний метод, який може викликати приватний метод
    public function puMethode()
    {
        echo "Привіт, я публічний метод і я викликаю приватний метод!<br>";

        try {
            $this->prMethode();
            echo "Приватний метод успішно викликано!<br>";
        } catch (Exception $e) {
            echo "Виникла помилка при виклику приватного методу: " . $e->getMessage() . "<br>";
        }
    }
}

// Створення 3 об'єктів
$product1 = new Product("Шоколад", 30, 5);
$product1->show_name();
$product1->show_storage_period();
$product1->show_amount();
echo "<hr>";

$product2 = new Product("Батон", 20, 20);
$product2->show();

$product3 = new Product("Чай", 90, 40);
$product3->show();

// Масив з 5 продуктів
$products = array();
$products[0] = new Product("Молоко", 30, 5);
$products[1] = new Product("Хліб", 10, 40);
$products[2] = new Product("Помідор", 10, 100);
$products[3] = new Product("Огурець", 10, 100);
$products[4] = new Product("Печево", 90, 40);

// Виведення інформації про всі продукти
$product1->show_object($products);

// Пошук продукту по назві
$search_product = "Хліб";
$found = false;

foreach ($products as $product) {
    if ($product->search($search_product)) {
        echo "Продукт " . $search_product . " є в наявності.<br><br>";
        $found = true;
        break;
    }
}

if (!$found) {
    echo "Продукт " . $search_product . " немає в наявності.<br>";
}

//Виклик публічного методу, який викликає приватний
$product1->puMethode();

// Виклик private поля, що призведе до помилки, потрібно звертатися через методи set/get
//$product1->weight;

// Видалення об'єктів
unset($product1);
unset($product2);
unset($product3);
unset($products);
?>