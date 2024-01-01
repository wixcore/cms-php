<?php
# Створюємо простори імен.
namespace WixCore;

use WixCore\Helper\Common;

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
        print_r($this->container);
    }
}