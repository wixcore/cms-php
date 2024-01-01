<?php
# Створюємо простори імен.
namespace WixCore;

use WixCore\Pattern\Container;

abstract class Controller
{
    protected $container;
    protected $view;

    /**
     * @param Container $container
     */

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->view = $this->container->get('view');
    }
}