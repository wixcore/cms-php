<?php

namespace WixCore\Service\Config;

use WixCore\Service\AbstractProvider;
use WixCore\Config\Config;

class Provider extends AbstractProvider
{
    public $serviceName = 'config';

    public function init()
    {
        $config['main'] = Config::file('main');
        $config['database'] = Config::file('database');

        $this->container->set($this->serviceName, $config);
    }
}