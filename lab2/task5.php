<?php
class Document
{
    protected $recognition; // призначення
    protected $carrier; // носій
    protected $year_of_creation; // рік створення
    protected static $documentCount = 0; // статичне поле для лічильника документів

    public function __construct($recognition = "", $carrier = "", $year_of_creation = 0)
    {
        $this->recognition = $recognition;
        $this->carrier = $carrier;
        $this->year_of_creation = $year_of_creation;
        self::$documentCount++; // збільшення лічильника при створенні нового об'єкта
    }

    public static function getDocumentCount()
    {
        return self::$documentCount; // статичний метод для отримання кількості документів
    }

    public function getRecognition()
    {
        return $this->recognition;
    }

    public function getCarrier()
    {
        return $this->carrier;
    }

    public function getYearOfCreation()
    {
        return $this->year_of_creation;
    }

    public function displayInfo() // функція друку
    {
        echo "<b>Призначення:</b> <i>" . $this->recognition . "</i><br>";
        echo "<b>Носій:</b> <i>" . $this->carrier . "</i><br>";
        echo "<b>Рік створення:</b> <i>" . $this->year_of_creation . "</i><br>";
        echo "<br>";
    }

    public function __destruct()
    {
        echo "Об'єкт <i>'{$this->recognition}'</i> видалено.<br>";
    }
}

class Referat extends Document
{
    private $topic; // тема
    private $performer; // виконавець
    private $number_of_sheets; // кількість аркушів

    public function __construct($recognition = "", $carrier = "", $year_of_creation = 0, $topic = "", $performer = "", $number_of_sheets = 0)
    {
        parent::__construct($recognition, $carrier, $year_of_creation);
        $this->topic = $topic;
        $this->performer = $performer;
        $this->number_of_sheets = $number_of_sheets;
    }

    public function getTopic()
    {
        return $this->topic;
    }

    public function getPerformer()
    {
        return $this->performer;
    }

    public function getNumberOfSheets()
    {
        return $this->number_of_sheets;
    }

    public function displayInfo() // щоб виведення було без зайвого відступу, зроблено без виклику методу батьківського класу
    {
        echo "<b>Призначення:</b> <i>" . $this->recognition . "</i><br>";
        echo "<b>Носій:</b> <i>" . $this->carrier . "</i><br>";
        echo "<b>Рік створення:</b> <i>" . $this->year_of_creation . "</i><br>";
        echo "<b>Тема:</b> <i>" . $this->topic . "</i><br>";
        echo "<b>Виконавець:</b> <i>" . $this->performer . "</i><br>";
        echo "<b>Кількість аркушів:</b> <i>" . $this->number_of_sheets . "</i><br>";
        echo "<br>";
    }
}

// Приклади
$document1 = new Document("Тестовий документ", "А4", 2023);
$document1->displayInfo();

$document2 = new Document("Тестовий документ2", "А4", 2020);
$document2->displayInfo();

$referat1 = new Referat("Тестовий реферат", "А4", 2022, "Об'єктно-орієнтоване програмування", "Валерія Терещенко", 20);
$referat1->displayInfo();

$referat2 = new Referat("Тестовий реферат2", "А4", 2021, "Історія України", "Катерина Шевченко", 15);
$referat2->displayInfo();

// Виклик статичного методу для отримання кількості створених документів
echo "<b>Кількість створених документів:</b> " . Document::getDocumentCount() . "<br><br>";
?>