<?php
namespace WixCore\Service\Database;

use WixCore\Service\AbstractProvider;
use WixCore\Database\Connection;

class Provider extends AbstractProvider
{
    public $serviceName = 'db';

    public function init()
    {
        $db = new Connection();
        $this->container->set($this->serviceName, $db);
    }
}
