<?php

namespace WixCore\Config;

class Config
{
    /**
     * @param $key
     * @param $group
     * @return mixed|null
     * @throws \Exception
     */
    public static function item($key, $group = 'main')
    {
        // Отримайте групу елементів за допомогою методу «файл».
        $groupItems = static::file($group);
        // Перевірте, чи існує вказаний ключ у групі, і поверніть відповідне значення.
        return isset($groupItems[$key]) ? $groupItems[$key] : null;
    }

    /**
     * @param $group
     * @return array
     * @throws \Exception
     */
    public static function file($group)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . mb_strtolower(ENV) . '/Config/' . $group . '.php';
        if (file_exists($path))
        {
            $items = require_once $path;

            if (is_array($items))
            {
                return $items;
            }
            else
            {
                throw new \Exception(sprintf('Config file <strong>%s</strong> is not a valid array', $path));
            }
        }
        else
        {
            throw new \Exception(sprintf('Cannot load config from file, file <strong>%s</strong> does not exist', $path));
        }
    }
}