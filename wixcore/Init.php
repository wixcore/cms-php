<?php
# Створюємо простори імен.
namespace WixCore;

use WixCore\Helper\Common;
use WixCore\Routing\DispatchedRoute;

class Init
{
    private $container;
    private $router;

    /**
     * @param $container
     */

    public function __construct($container)
    {
        $this->container = $container;
        $this->router = $this->container->get('router');
    }

    /**
     * @return void
     */

    public function run()
    {
        try {
            require_once __DIR__ . '/../cms/Route.php';
            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());
            if ($routerDispatch == null)
            {
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
            }
            list($class, $action) = explode(':', $routerDispatch->getController(), 2);
            $controller = '\\Cms\\Controller\\' . $class;
            $parameters = $routerDispatch->getParameters();
            // Assuming $action is a method with named parameters
            $controllerInstance = new $controller($this->container);
            call_user_func_array([$controllerInstance,  $action], $parameters);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}