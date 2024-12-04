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

abstract class Handler
{
    protected $nextHandler;

    // Встановлює наступний обробник у ланцюгу
    public function setNext(Handler $handler)
    {
        $this->nextHandler = $handler;
        return $handler; // Для можливості ланцюгового виклику
    }

    // Обробка запиту
    public function handle($request)
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($request);
        }
        return null;
    }
}

class NameHandler extends Handler
{
    private $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function handle($request)
    {
        if (isset($request['name'])) {
            foreach ($this->products as $product) {
                if ($product->getName() == $request['name']) {
                    echo "Продукт знайдено за назвою: " . $product->getName() . "<br>";
                    return $product;
                }
            }
        }
        return parent::handle($request);
    }
}

class StoragePeriodHandler extends Handler
{
    private $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function handle($request)
    {
        if (isset($request['storage_period'])) {
            foreach ($this->products as $product) {
                if ($product->getStoragePeriod() == $request['storage_period']) {
                    echo "Продукт знайдено за терміном зберігання: " . $product->getName() . "<br>";
                    return $product;
                }
            }
        }
        return parent::handle($request);
    }
}

class AmountHandler extends Handler
{
    private $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function handle($request)
    {
        if (isset($request['amount'])) {
            foreach ($this->products as $product) {
                if ($product->getAmount() == $request['amount']) {
                    echo "Продукт знайдено за кількістю: " . $product->getName() . "<br>";
                    return $product;
                }
            }
        }
        return parent::handle($request);
    }
}

// Створення масиву продуктів
$products = array(
    new Product("Молоко", 30, 5),
    new Product("Хліб", 10, 40),
    new Product("Помідор", 10, 100),
    new Product("Огурець", 10, 100),
    new Product("Печево", 90, 40)
);

// Ініціалізація обробників
$nameHandler = new NameHandler($products);
$storageHandler = new StoragePeriodHandler($products);
$amountHandler = new AmountHandler($products);

// Побудова ланцюга
$nameHandler->setNext($storageHandler)->setNext($amountHandler);

// Пошук продукту за різними критеріями
$request = ['name' => 'Хліб']; // Пошук за назвою
$nameHandler->handle($request);

$request = ['storage_period' => 90]; // Пошук за терміном зберігання
$nameHandler->handle($request);

$request = ['amount' => 100]; // Пошук за кількістю
$nameHandler->handle($request);
?>