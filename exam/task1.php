<?php
interface Event // заходи, в якому брав участь студент
{
    public function getDate(): string; // отримати дату, де проводився захід
    public function getCity(): string; // отримати місто, де проводився захід
    public function setDate(string $date); // змінити дату, де проводився захід
    public function setCity(string $city); // змінити місто, де проводився захід
}

class Olympiad implements Event // олімпіада
{
    private string $date; // дата проведення олімпіади
    private string $city; // місто проведення олімпіади
    private int $place; // місце, яке зайняв студент на олімпіаді

    public function getDate(): string
    {
        return $this->date;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getPlace(): int
    {
        return $this->place;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function setPlace(int $place)
    {
        if ($place < 0) {
            throw new Exception("Місце на олімпіаді повинне бути не менше 0.<br>");
        }
        if (!is_int($place)) {
            throw new Exception("Місце на олімпіаді повинне бути цілим числом.<br>");
        }
        $this->place = $place;
    }

    public function show()
    {
        echo "<b>Дата проведення олімпіади</b>: " . $this->date . "<br>";
        echo "<b>Місто проведення олімпіади</b>: " . $this->city . "<br>";
        echo "<b>Місце студента на олімпіаді</b>: " . $this->place . "<br>";
        echo "<hr>";
    }

    public function __construct(string $date, string $city, int $place)
    {
        if ($place < 0) {
            throw new Exception("Місце на олімпіаді повинне бути не менше 0.<br>");
        }
        if (!is_int($place)) {
            throw new Exception("Місце на олімпіаді повинне бути цілим числом.<br>");
        }
        $this->date = $date;
        $this->city = $city;
        $this->place = $place;
    }
}

class Сonference implements Event // конференція
{
    private string $date; // дата проведення конференції
    private string $city; // місто проведення конференції
    private string $theme; // назва доповіді (статті)

    public function getDate(): string
    {
        return $this->date;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getTheme(): string
    {
        return $this->theme;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function setTheme(string $theme)
    {
        $this->theme = $theme;
    }

    public function show()
    {
        echo "<b>Дата проведення конференції</b>: " . $this->date . "<br>";
        echo "<b>Місто проведення конференції</b>: " . $this->city . "<br>";
        echo "<b>Назва доповіді (статті)</b>: " . $this->theme . "<br>";
        echo "<hr>";
    }

    public function __construct(string $date, string $city, string $theme)
    {

        $this->date = $date;
        $this->city = $city;
        $this->theme = $theme;
    }
}

// приклад створення об'єкта olympiad з невалідними даними
try {
    $olympiad = new Olympiad("12.04.2024", "Суми", -1); // помилка: місце на олімпіаді повинне бути не менше 0
} catch (Exception $e) {
    echo $e->getMessage();
}

// приклад створення об'єкта olympiad
try {
    $olympiad = new Olympiad("12.04.2024", "Суми", 1);
    $olympiad->show();
} catch (Exception $e) {
    echo $e->getMessage();
}

// приклад створення об'єкта conference
try {
    $conference = new Сonference("15.05.2024", "Львів", "Наукова конференція");
    $conference->show();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>