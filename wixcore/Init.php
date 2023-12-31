<?php
# Створюємо простори імен.
namespace WixCore;

# Використовуємо простори імен
// use WixCore\Database\Connection;

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
        // $db = new Connection();
        // $db->execute("INSERT INTO `user` SET `username` = 'username', `password`='123456789', `date`=" . time());
        // print_r($db->query("SELECT * FROM `user`"));
        die('Сайт успішно ініціалізовано.');
    }
}