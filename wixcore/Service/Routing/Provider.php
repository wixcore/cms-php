<?php
namespace WixCore\Service\Routing;

use WixCore\Service\AbstractProvider;
use WixCore\Routing\Router;

class Provider extends AbstractProvider
{
    public $serviceName = 'router';

    /**
     * @return void
     */

    public function init()
    {
        $router = new Router('http://cms-php/');
        $this->container->set($this->serviceName, $router);
    }
}
