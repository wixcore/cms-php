<?php

namespace WixCore\Request;

class Request
{
    public $get = [];
    public $post = [];
    public $request = [];
    public $cookie = [];
    public $files = [];
    public $server = [];

    public function __construct()
    {
        $this->get      = $_GET;
        $this->post     = $_POST;
        $this->request  = $_REQUEST;
        $this->cookie   = $_COOKIE;
        $this->files    = $_FILES;
        $this->server   = $_SERVER;
    }
}