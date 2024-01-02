<?php

$this->router->add('login', '/admin/login', 'loginController:form');
$this->router->add('dashboard', '/admin/', 'dashboardController:index');