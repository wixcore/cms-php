<?php
// Встановлення строгого режиму типізації для цього файлу.
declare(strict_types=1);
// Підключення автозавантажувача Composer
require_once __DIR__ . '/vendor/autoload.php';
// Визначення константи ROOT_DIR з поточним каталогом
define('ROOT_DIR', __DIR__);

try {
    // Todo - Source Code           
} catch (\ErrorException $e) {
    // Виведення повідомлення про помилку і завершення виконання програми.
    die($e->getMessage());
}