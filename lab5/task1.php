<?php class someClass
{
    protected static $_instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {

            someClass::$_instance = new someClass();
        }

        return self::$_instance;
    }

    private function __clone()
    {

    }

    private function __wakeup()
    {

    }
}

// Тестуємо патерн Singleton
$obj = someClass::getInstance();  // Перший екземпляр
$obj2 = someClass::getInstance();  // Другий екземпляр (отриманий через Singleton)

if ($obj === $obj2) {
    echo "Один і той же об'єкт!";
} else {
    echo "Різні об'єкти!";
}
?>