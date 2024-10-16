<?php
date_default_timezone_set('Europe/Kiev');
trait my_first_trait
{
    public function traitFunction()
    {
        echo "Hello world<br>";
    }

    public function greeting()
    {
        $hour = date("H"); // Отримуємо поточну годину (від 0 до 23)

        if ($hour >= 5 && $hour < 12) {
            echo "Good morning<br>";
        } elseif ($hour >= 12 && $hour < 18) {
            echo "Good afternoon<br>";
        } elseif ($hour >= 18 && $hour < 22) {
            echo "Good evening<br>";
        } else {
            echo "Good night<br>";
        }
    }
}

class HelloWorld
{
    use my_first_trait; // використання трейту
}

// Приклад використання
$objTest = new HelloWorld();
$objTest->traitFunction(); // Виведе "Hello world"
$objTest->greeting(); // Виведе привітання залежно від часу доби
?>