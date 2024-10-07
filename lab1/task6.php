<?php
class WorkWithFile
{
    private $buff; // Вміст файлу
    private $filename; // Ім'я файлу

    function __construct($filename)
    {
        $uploaddir = './';
        $this->filename = $uploaddir . $filename;

        try {
            // Перевірка наявності файлу
            if (!file_exists($this->filename)) {
                throw new Exception("Файла не існує");
            }

            // Отримуємо розмір файлу
            $fileSize = filesize($this->filename);

            // Перевірка на пустий файл
            if ($fileSize === 0) {
                throw new Exception("Файл пустий");
            }

            // Відкриття файлу
            $fd = fopen($this->filename, "r");

            if (!$fd) {
                throw new Exception("Не вдалося відкрити файл");
            }

            // Читання вмісту файлу
            $this->buff = fread($fd, $fileSize);
            fclose($fd);
        } catch (Exception $e) {
            echo 'Помилка: ', $e->getMessage(), "<br>";
            exit(); // Завершуємо виконання, якщо виникла помилка
        }
    }

    // Метод для відображення вмісту файлу
    function getContent()
    {
        return $this->buff;
    }

    function getFilename()
    {
        return $this->filename;
    }

    // Метод для видалення першого та останнього чисел
    public function removeFirstAndLast()
    {
        try {
            // Розділяємо вміст на рядки, видаляючи пробіли
            $lines = preg_split('/\R/', trim($this->buff));

            // Перевірка на наявність достатньої кількості чисел
            if (count($lines) < 2) {
                throw new Exception("Недостатньо чисел у файлі для видалення");
            }

            // Видалення першого та останнього числа
            array_shift($lines); // Видалити перше число
            array_pop($lines);    // Видалити останнє число

            // Записуємо оновлений вміст назад у файл
            file_put_contents($this->filename, implode(PHP_EOL, $lines));

            // Оновлення buff
            $this->buff = implode(PHP_EOL, $lines);
        } catch (Exception $e) {
            echo 'Помилка: ', $e->getMessage(), "<br>";
        }
    }
}

// Використання класу
try {
    $first = new WorkWithFile("count.txt");
    echo "Вміст файлу перед видаленням:<br>{$first->getContent()}<br>";

    // Видалення першого та останнього чисел
    $first->removeFirstAndLast();

    // Виведення оновленого вмісту файлу
    echo "Вміст файлу після видалення першого та останнього чисел:<br>{$first->getContent()}<br>";

} catch (Exception $e) {
    echo 'Помилка: ', $e->getMessage(), "<br>";
}
?>