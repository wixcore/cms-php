<?php

namespace WixCore\Service\Request;

use WixCore\Service\AbstractProvider;
use WixCore\Request\Request;

class Provider extends AbstractProvider
{
    public $serviceName = 'request';

    public function init()
    {
        $request = new Request();
        $this->container->set($this->serviceName, $request);
    }
}