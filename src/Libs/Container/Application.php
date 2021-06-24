<?php

namespace Nin\Libs\Container;

use Nin\Libs\Request\RequestInterface;
use Nin\Libs\Routing\RouteConfigInterface;
use Nin\Repositories\FooRepository;
use Nin\Repositories\FooRepositoryInterface;
use Nin\Services\FooService;
use Nin\Services\FooServiceInterface;

class Application extends AbstractApplication
{
    protected array $dependencies = [
        FooServiceInterface::class => FooService::class,
        FooRepositoryInterface::class => FooRepository::class,
    ];

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
    }

    protected function configureRoutes(RouteConfigInterface $routes): RouteConfigInterface
    {
        $routes->configRequest($this->make(RequestInterface::class));
        $routes->import('routes.yaml');
        return $routes;
    }
}
