<?php

namespace App\Controllers;

use Nin\Libs\Controller\AbstractController;
use Nin\Libs\Facades\View;

class HomeController extends AbstractController
{
    public function indexAction()
    {
        return View::make('home');
    }
}
