<?php
// Абстрактний клас для обробника
abstract class PaymentHandler
{
    protected ?PaymentHandler $nextHandler = null;

    // Встановлення наступного обробника
    public function setNextHandler(PaymentHandler $handler): void
    {
        $this->nextHandler = $handler;
    }

    // Абстрактний метод для обробки
    abstract public function handle(float $amount): void;
}

// Обробник для основного рахунку
class MainAccountHandler extends PaymentHandler
{
    private float $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }

    public function handle(float $amount): void
    {
        if ($this->balance >= $amount) {
            echo "Покупка на суму $amount грн буде оплачена з основного рахунку.<br>";
            $this->balance -= $amount; // Оновлення залишку
        } else if ($this->nextHandler !== null) {
            $this->nextHandler->handle($amount);
        } else {
            echo "Оплату відхилено: недостатньо коштів на основному рахунку.<br>";
        }
    }
}

// Обробник для кредитної картки
class CreditCardHandler extends PaymentHandler
{
    private float $creditLimit;

    public function __construct(float $creditLimit)
    {
        $this->creditLimit = $creditLimit;
    }

    public function handle(float $amount): void
    {
        if ($this->creditLimit >= $amount) {
            echo "Покупка на суму $amount грн буде оплачена з кредитної картки.<br>";
            $this->creditLimit -= $amount; // Оновлення кредитного ліміту
        } else if ($this->nextHandler !== null) {
            $this->nextHandler->handle($amount);
        } else {
            echo "Оплату відхилено: недостатньо коштів на кредитній картці.<br>";
        }
    }
}

// Приклад використання
$mainAccount = new MainAccountHandler(500); // Баланс основного рахунку 500 грн
$creditCard = new CreditCardHandler(1000);  // Кредитний ліміт 1000 грн

// Побудова ланцюга
$mainAccount->setNextHandler($creditCard);

// Спроба оплати
echo "Перевірка оплати на суму 300 грн: ";
$mainAccount->handle(300);

echo "\nПеревірка оплати на суму 700 грн: ";
$mainAccount->handle(700);

echo "\nПеревірка оплати на суму 600 грн: ";
$mainAccount->handle(600);
?>