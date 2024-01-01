<?php
namespace WixCore\Service\View;

use WixCore\Service\AbstractProvider;
use WixCore\Template\View;

class Provider extends AbstractProvider
{
    public $serviceName = 'view';

    /**
     * @return void
     */

    public function init()
    {
        $view = new View();
        $this->container->set($this->serviceName, $view);
    }
}
