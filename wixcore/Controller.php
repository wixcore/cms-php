<?php
# Створюємо простори імен.
namespace WixCore;

use WixCore\Pattern\Container;

abstract class Controller
{
    protected $container;
    protected $view;
    protected $config;

    /**
     * @param Container $container
     */

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->view = $this->container->get('view');
        $this->config = $this->container->get('config');
    }
}