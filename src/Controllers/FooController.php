<?php

namespace Nin\Controllers;

use Nin\Entities\User;
use Nin\Libs\Facades\Auth;
use Nin\Libs\Facades\Config;
use Nin\Libs\Facades\Log;
use Nin\Libs\Facades\Request;
use Nin\Libs\Facades\View;
use Nin\Libs\Logger\LoggerContract;
use Nin\Libs\Request\RequestContract;
use Nin\Libs\View\ViewFactory;
use Nin\Repositories\FooRepositoryInterface;
use Nin\Libs\Config\ConfigContract as ConfigContract;
use Nin\Repositories\UserRepository;

class FooController
{
    protected FooRepositoryInterface $fooRepository;
    protected ConfigContract $config;
    protected LoggerContract $log;
    protected ViewFactory $view;
    protected UserRepository $userRepository;
    protected RequestContract $request;

    public function __construct(
        FooRepositoryInterface $fooRepository,
        ViewFactory $view,
        UserRepository $userRepository,
        RequestContract $request
    ) {
        $this->fooRepository = $fooRepository;
//        $this->config = $config;
//        $this->log = $log;
        $this->view = $view;
        $this->userRepository = $userRepository;
        $this->request = $request;
    }

    public function indexAction()
    {
        return "AAA";
/*        $request = $this->request;

        $entity = $this
            ->setEntityProperty($this->userRepository
                ->getEntityInstance());
        $this->userRepository->save($entity);
        vd($this->userRepository->all());
        $foo = [
            ['name' => 'Alicee'],
            ['name' => 'Bob'],
            ['name' => 'Eve'],
        ];
        return View::make('index', ['foo' => $foo]);*/

//        Log::debug('message');
//        vd($this->fooRepository->getBar());
//        vd($this->config->all());
//        throw new \RuntimeException("ss");
        /*   $check = Auth::check();
           $user = Auth::user();
           var_dump($user);*/
    }

    public function create()
    {
        $entity = $this
            ->setEntityProperty($this->userRepository
                ->getEntityInstance());
        $this->userRepository->save($entity);
        vd();
    }

    protected function setEntityProperty(User $user)
    {
        $user->setName('user3');
        return $user;
    }

    public function loadAction(RequestContract $request, int $id)
    {
//        vd($request->query());
        /*$bar = $this->fooRepository->getBar();
        return "ID:" . $id . ":bar:" . $bar;*/
    }
}
