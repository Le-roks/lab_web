<?php

class ProductFileHandler
{
    private $filename;

    // Конструктор приймає ім'я файлу
    public function __construct($filename)
    {
        $this->filename = $filename;

        // Перевірка, чи існує файл
        if (!file_exists($this->filename)) {
            exit("Файлу не існує.");
        }
    }

    // Метод для читання та виведення даних
    public function displayData()
    {
        // Відкриття файлу для читання
        if (($handle = fopen($this->filename, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                echo "Назва: {$data[0]}<br>";
                echo "Термін придатності: {$data[1]}<br>";
                echo "Кількість: {$data[2]}<br><br>";
            }
            fclose($handle);
        } else {
            echo "Помилка відкриття файлу.";
        }
    }

    // Метод для додавання даних у файл
    public function addProduct($name, $expiry, $quantity)
    {
        // Відкриття файлу для додавання даних
        if (($handle = fopen($this->filename, "a")) !== FALSE) {
            // Додавання нових даних у файл
            fputcsv($handle, [$name, $expiry, $quantity], ";");
            fclose($handle);
        } else {
            echo "Помилка відкриття файлу для запису.";
        }
    }
}

// Використання класу
$productHandler = new ProductFileHandler("file.csv");

// Виведення наявних даних
$productHandler->displayData();

// Додавання нового продукту
$productHandler->addProduct("Сир", 30, 50);

// Виведення оновлених даних після додавання
echo "<br>Після додавання нового продукту:<br><br>";
$productHandler->displayData();
?>