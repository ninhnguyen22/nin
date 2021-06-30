<?php

namespace Nin\Controllers;

use Nin\Libs\Facades\Auth;
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
        $check = Auth::check();
        $user = Auth::user();
        var_dump($user);
    }

    public function loadAction($id)
    {
        $bar = $this->fooRepository->getBar();
        return "ID:" . $id . ":bar:" . $bar;
    }
}
