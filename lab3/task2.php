<?php
abstract class Figure
{
    protected $x1; // Лівий верхній кут / Початок радіуса кола
    protected $y1;
    protected $x2; // Правий нижній кут / Кінець радіуса кола
    protected $y2;

    public function __construct($x1, $y1, $x2, $y2)
    {
        $this->x1 = $x1;
        $this->y1 = $y1;
        $this->x2 = $x2;
        $this->y2 = $y2;
    }

    public function getX1()
    {
        return $this->x1;
    }

    public function getY1()
    {
        return $this->y1;
    }

    public function getX2()
    {
        return $this->x2;
    }

    public function getY2()
    {
        return $this->y2;
    }

    abstract public function area(); // Метод для обчислення площі
    abstract public function centre(); // Метод для виведення координат центру фігури
}

class Circle extends Figure
{
    public function area() // Обчислення площі кола
    {
        $radius = sqrt(pow($this->x2 - $this->x1, 2) + pow($this->y2 - $this->y1, 2)); // Радіус кола
        return M_PI * pow($radius, 2);
    }

    public function centre() // Виведення координат центру кола
    {
        $centerX = ($this->x1 + $this->x2) / 2;
        $centerY = ($this->y1 + $this->y2) / 2;
        echo "Центр кола: ($centerX, $centerY)<br>";
    }
}

class Rectangle extends Figure
{
    public function area() // Обчислення площі прямокутника
    {
        $width = abs($this->x2 - $this->x1);
        $height = abs($this->y2 - $this->y1);
        return $width * $height;
    }

    public function centre() // Виведення координат центру прямокутника
    {
        $centerX = ($this->x1 + $this->x2) / 2;
        $centerY = ($this->y1 + $this->y2) / 2;
        echo "Центр прямокутника: ($centerX, $centerY)<br>";
    }
}

// Приклади використання
$circle = new Circle(0, 0, 4, 3); // Коло з початком у (0, 0) і кінцем радіуса у (4, 3)
echo "Початок радіуса кола - (0,0)<br>";
echo "Кінець радіуса кола - (4,3)<br>";
echo "Площа кола: " . round($circle->area(), 2) . "<br>";
$circle->centre();
echo "<hr>";

$rectangle = new Rectangle(1, 1, 5, 4); // Прямокутник з координатами (1, 1) і (5, 4)
echo "Верхній лівий кут прямокутника - (1,1)<br>";
echo "Нижній правий кут прямокутника - (5,4)<br>";
echo "Площа прямокутника: " . round($rectangle->area(), 2) . "<br>";
$rectangle->centre();
?>