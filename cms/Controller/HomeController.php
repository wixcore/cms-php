<?php

namespace Cms\Controller;

class HomeController extends CmsController
{
    /**
     * @return void
     */

    public function index()
    {
        echo 'Index Page';
    }

    /**
     * @param $id
     * @return void
     */

    public function news($id)
    {
        echo $id;
    }
}