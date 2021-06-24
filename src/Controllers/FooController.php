<?php

namespace Nin\Controllers;

use Nin\Repositories\FooRepositoryInterface;

class FooController
{
    protected FooRepositoryInterface $fooRepository;

    public function __construct(FooRepositoryInterface $fooRepository)
    {
        $this->fooRepository = $fooRepository;
    }

    public function indexAction()
    {
        die('index');
    }

    public function loadAction($id)
    {
        $bar = $this->fooRepository->getBar();
        return "ID:" . $id . ":bar:" . $bar;
    }
}
