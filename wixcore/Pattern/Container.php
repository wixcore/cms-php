<?php

namespace WixCore\Pattern;

class Container
{
    # Контейнер
    protected static $instance;
    # Контейнер залежностей.
    private $container = [];
    # Отримати залежність від контейнера.
    public function get($key)
    {
        return $this->has($key) ? $this->container[$key] : null;
    }
    # Додайте залежність до контейнера.
    public function set($key, $value)
    {
        $this->container[$key] = $value;
        return $this;
    }
    # Подивіться, чи є залежність у контейнері.
    public function has($key)
    {
        return isset($this->container[$key]);
    }
    # Контейнер для повернення
    public static function instance(): Container
    {
        if (self::$instance == null) {
            self::$instance = new Container();
        }
        return self::$instance;
    }
}