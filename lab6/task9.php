<?php
// Основний клас Продукт
class Product
{
    public $name;
    public $storage_period;
    public $amount;
    private $weight = 0;

    public function __construct($name = "Name", $storage_period = 0, $amount = 0)
    {
        $this->name = $name;
        $this->storage_period = $storage_period;
        $this->amount = $amount;
    }

    public function show()
    {
        echo "Назва: " . $this->name . "<br>";
        echo "Термін зберігання: " . $this->storage_period . " днів<br>";
        echo "Кількість: " . $this->amount . "<br>";
        echo "<hr>";
    }
}

// Інтерфейс для продуктів
interface ProductInterface
{
    public function getName();
    public function getStoragePeriod();
    public function getAmount();
}

// Адаптер для роботи з асоціативним масивом як з продуктом
class ProductAdapter implements ProductInterface
{
    protected $productData;

    public function __construct($productData)
    {
        $this->productData = $productData;
    }

    public function getName()
    {
        return $this->productData['name'];
    }

    public function getStoragePeriod()
    {
        return $this->productData['storage_period'];
    }

    public function getAmount()
    {
        return $this->productData['amount'];
    }
}

// Демонстрація роботи
// Створення звичайного об'єкта Product
$product = new Product("Хліб", 7, 15);
$product->show();

// Створення даних у вигляді масиву (з іншої системи)
$productData = [
    'name' => 'Молоко',
    'storage_period' => 10,
    'amount' => 30
];

// Робота з масивом через адаптер
$productAdapter = new ProductAdapter($productData);
echo "Назва через адаптер: " . $productAdapter->getName() . "<br>";
echo "Термін зберігання через адаптер: " . $productAdapter->getStoragePeriod() . " днів<br>";
echo "Кількість через адаптер: " . $productAdapter->getAmount() . "<br>";
echo "<hr>";
?>