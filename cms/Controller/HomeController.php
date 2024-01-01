<?php

namespace Cms\Controller;

class HomeController extends CmsController
{
    /**
     * @return void
     */

    public function index()
    {
        $data = ['example' => 'Example'];
        $this->view->render('main', $data);
    }
}