<?php
// Трейт для реалізації Singleton
trait Singleton
{
    // Статична змінна для зберігання єдиного екземпляра
    protected static $_instance;

    // Приватний конструктор, щоб заборонити створення екземплярів ззовні
    private function __construct()
    {
    }

    // Публічний метод для отримання єдиного екземпляра
    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Приватний метод для заборони клонування об'єкта
    private function __clone()
    {
    }

    // Приватний метод для заборони десеріалізації
    private function __wakeup()
    {
    }
}

// Клас, який використовує трейт Singleton
class someClass
{
    use Singleton;
}

// Тестування патерну Singleton
$obj1 = someClass::getInstance();  // Отримуємо перший екземпляр
$obj2 = someClass::getInstance();  // Спроба отримати другий екземпляр

// Перевіряємо, чи це той самий екземпляр
if ($obj1 === $obj2) {
    echo "Це той самий екземпляр класу.\n";
} else {
    echo "Це різні екземпляри класу.\n";
}
?>