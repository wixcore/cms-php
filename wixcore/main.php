<?php
# Встановлення строгого режиму типізації для цього файлу.
declare(strict_types=1);
# Підключення автозавантажувача Composer
require_once ROOT_DIR . '/vendor/autoload.php';
# Використовуємо простори імен
use WixCore\Pattern\Container;
use WixCore\Init;
# Обробка винятків
try {
    # Створення екземпляра контейнера залежностей
    $container = new Container();
    # Підключаємо конфігурацію допоміжних файлів.
    $serviced = require_once ROOT_DIR . '/wixcore/Config/Service.php';
    # Створюємо кожного класу екземпляр.
    foreach ($serviced as $service)
    {
        $provider = new $service($container);
        $provider->init();
    }
    # Створення екземпляра ініціалізації з передачею контейнера
    $init = new Init($container);
    # Виклик методу "run" для ініціалізації
    $init->run();
} catch (\ErrorException $e) {
    // Виведення повідомлення про помилку і завершення виконання програми.
    die($e->getMessage());
}