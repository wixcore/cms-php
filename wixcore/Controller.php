<?php
# Створюємо простори імен.
namespace WixCore;

use WixCore\Pattern\Container;

abstract class Controller
{
    protected $container;
    protected $db;

    /**
     * @param Container $container
     */

    public function __construct(Container $container)
    {
        $this->container = $container;
    }
}       