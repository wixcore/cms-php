<?php
# Створюємо простори імен.
namespace WixCore\Service;
# Абстрактний клас, що надає загальний функціонал для провайдерів.
abstract class AbstractProvider
{
    # Захищене поле для зберігання контейнера залежностей.
    protected $container;  
    # Конструктор класу, який отримує контейнер залежностей.
    public function __construct(\WixCore\Pattern\Container $container)
    {
        $this->container = $container;
    }
    # Абстрактний метод для ініціалізації провайдера.
    abstract function init();
}