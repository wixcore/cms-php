<?php
# Створюємо простори імен.
namespace WixCore;
# Створюємо клас оброблювача.
class Init
{
    # Приватне поле для зберігання контейнера залежностей.
    private $container;
    # Конструктор, який приймає контейнер і присвоює його полю об'єкта.
    public function __construct($container)
    {
        $this->container = $container;
    }
    # Метод для запуску движка.
    public function run()
    {
        die('Сайт успішно ініціалізовано.');
    }
}