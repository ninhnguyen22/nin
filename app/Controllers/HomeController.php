<?php

namespace App\Controllers;

use Nin\Libs\Controller\AbstractController;
use Nin\Libs\Facades\View;

class HomeController extends AbstractController
{
    public function indexAction()
    {
       return View::make('home', ['documentUrl' => 'https://ninhnguyen22.github.io/blog/docs/nin/']);
    }
}
