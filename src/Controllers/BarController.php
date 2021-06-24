<?php

namespace Nin\Controllers;

use Nin\Repositories\BarRepository;

class BarController
{
    protected BarRepository $barRepository;

    public function __construct(BarRepository $barRepository)
    {
        $this->barRepository = $barRepository;
    }

    public function indexAction()
    {
        return $this->barRepository->getBar();
    }

}
