<?php
class db
{
    // Статична змінна для зберігання єдиного екземпляра класу
    private static $instance = null;

    // Змінна для підключення до бази даних
    private $db;

    // Приватний конструктор для заборони створення об’єктів ззовні
    private function __construct()
    {
        echo "<h1>Connecting with database</h1>";
        $this->db = new mysqli('localhost', 'root', '', 'test'); // Вкажіть правильну назву бази

        if ($this->db->connect_error) {
            throw new Exception("Connection error: " . $this->db->connect_error);
        }

        $this->db->query("SET NAMES 'UTF8'");
    }

    // Метод для отримання єдиного екземпляра класу
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Метод для отримання даних з таблиці
    public function get_data()
    {
        $query = "SELECT * FROM menu";
        $result = $this->db->query($query);

        $row = [];
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row[] = $result->fetch_assoc();
        }

        return $row;
    }

    // Приватний метод для заборони клонування об'єкта
    private function __clone()
    {
    }

    // Приватний метод для заборони десеріалізації об'єкта
    private function __wakeup()
    {
    }
}

// Тестування Singleton
$db1 = db::getInstance(); // Отримання єдиного екземпляра класу
$db2 = db::getInstance(); // Такий самий екземпляр

// Перевіряємо, чи це той самий екземпляр
if ($db1 === $db2) {
    echo "<p>Це той самий екземпляр класу!</p>";
}
?>