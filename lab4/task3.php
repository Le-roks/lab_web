<?php
date_default_timezone_set('Europe/Kiev');
// Інтерфейс ILogger з методом logMessage
interface ILogger
{
    public function logMessage($message);
}

// Трейт для виведення поточної дати та часу
trait DateTimeTrait
{
    public function getCurrentDateTime()
    {
        return date("F j, Y, g:i a");
    }
}

// Трейт для запису повідомлення у файл
trait FileTrait
{
    public function writeToFile($filename, $content)
    {
        file_put_contents($filename, $content, FILE_APPEND | LOCK_EX);
    }
}

// Клас FileLogger, який використовує трейти та реалізує інтерфейс ILogger
class FileLogger implements ILogger
{
    use DateTimeTrait, FileTrait;

    private $logFile;

    public function __construct($logFile)
    {
        $this->logFile = $logFile;
    }

    public function logMessage($message)
    {
        $dateTime = $this->getCurrentDateTime();
        $logEntry = "{$dateTime}: {$message}\n";
        $this->writeToFile($this->logFile, $logEntry);
        echo "Повідомлення успішно записано в {$this->logFile}!<br>";
    }

    public function getLogFile()
    {
        return $this->logFile;
    }
}

// Використання класу та відправка повідомлення через форму
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["message"])) {
    $message = htmlspecialchars($_POST["message"]);
    $logger = new FileLogger("log.txt"); // створюємо екземпляр класу
    $logger->logMessage($message);
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма додавання повідомлення</title>
</head>

<body>
    <form method="POST">
        <label for="message">Введіть повідомлення:</label><br>
        <input type="text" id="message" name="message" required><br><br>
        <button type="submit">Відправити</button>
    </form>
</body>

</html>