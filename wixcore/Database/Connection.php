<?php
# Створюємо простори імен.
namespace WixCore\Database;

# Використовуємо простори імен
use PDO;
use PDOException;
use WixCore\Config\Config;

# Створюємо клас оброблювача.
class Connection
{
    # Приватне поле для зберігання об'єкта PDO, яке представляє з'єднання з базою даних
    private $link;

    # Виклик методу connect при створенні об'єкта класу
    public function __construct()
    {
        $this->connect();
    }

    # Приватний метод для з'єднання з базою даних
    private function connect()
    {
        # Додано слеш перед "config.php"
        $config = Config::file('database');
        # Складання DSN (Data Source Name) для підключення до бази даних
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];

        try {
            # Створення об'єкта PDO для підключення до бази даних
            $this->link = new PDO($dsn, $config['username'], $config['password']);
            # Налаштування, щоб PDO повертало помилки при виникненні
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            # Обробка помилок під час підключення до бази даних
            $styles = '<style>body {display: flex;align-items: center;justify-content: center;height: 100vh;margin: 0;background-color: #f4f4f4;}.error-box {border: 2px solid #ff6347;padding: 20px;max-width: 400px;text-align: center;background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}.error-box h2 {color: #ff6347;}.error-message {margin-top: 15px;color: #333;}</style>';
            $header = '<!doctype html><html lang="uk" dir="ltr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title>No connection to database || WixCore.Net</title>' . $styles . '</head><body>';
            $content = 'Помилка підключення до бази даних:<br /><br>' . $e->getMessage();
            $footer = '</body></html>';
            $result = $header . $content . $footer;
            die($result);
        }

        return $this;
    }

    # Метод для виконання SQL-запиту, який не повертає результат
    public function execute($sql)
    {
        # Підготовлює SQL-запит за допомогою методу prepare
        $sth = $this->link->prepare($sql);
        # Виконує підготовлений SQL-запит і повертає результат (true або false)
        return $sth->execute();
    }

    # Метод для виконання SQL-запиту, який повертає результат у вигляді асоціативного масиву
    public function query($sql)
    {
        # Підготовлює SQL-запит за допомогою методу prepare
        $sth = $this->link->prepare($sql);
        # Виконує підготовлений SQL-запит
        $sth->execute();
        # Викликає метод fetchAll для отримання всіх рядків результата запиту у вигляді асоціативного масиву
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        # Перевіряє, чи отримані дані успішно, якщо ні, повертає порожній масив
        if ($result === false) {
            return [];
        }

        # Повертає отримані дані (асоціативний масив)
        return $result;
    }
}
