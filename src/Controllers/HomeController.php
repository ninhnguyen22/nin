<?php

namespace Nin\Controllers;

use Nin\Libs\Facades\View;

class HomeController
{
    public function indexAction()
    {
        return View::make('index');
    }
}
