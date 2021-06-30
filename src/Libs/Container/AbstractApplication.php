<?php

namespace Nin\Libs\Container;

use Nin\Libs\Controller\ControllerInterface;
use Nin\Libs\Facades\RegisterFacade;
use Nin\Libs\Routing\RouteConfigInterface;
use Nin\Libs\Routing\RoutingInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Class AbstractApplication
 * @package Nin\Libs\Container
 */
abstract class AbstractApplication
{

    /**
     * @var RoutingInterface
     */
    protected RoutingInterface $router;

    /**
     * @var RouteConfigInterface
     */
    protected RouteConfigInterface $routerConfig;

    /**
     * @var ControllerInterface
     */
    protected ControllerInterface $controller;

    /**
     * @var ContainerInterface
     */
    protected ContainerInterface $container;

    /**
     * Declare default dependencies.
     * @var array
     */
    protected array $defaultDependencies = [
        \Nin\Libs\Routing\RouteConfigInterface::class => \Nin\Libs\Routing\RoutingConfigurator::class,
        \Nin\Libs\Request\RequestInterface::class => \Nin\Libs\Request\Factory::class,
        \Nin\Libs\Auth\AuthManagerFactory::class => \Nin\Libs\Auth\AuthManager::class
    ];

    /**
     * Declare dependencies.
     * @var array
     */
    protected array $dependencies = [
    ];

    abstract protected function configureRoutes(RouteConfigInterface $routes): RouteConfigInterface;

    /**
     * AbstractApplication constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        $this->boot();
    }

    public function bind($instance, $concrete = null)
    {
        $this->container->bind($instance, $concrete);
    }

    public function make($instance)
    {
        return $this->container->make($instance);
    }

    protected function registerDependencies($dependencies)
    {
        foreach ($dependencies as $interface => $instance) {
            $this->container->bind($interface, $instance);
        }
    }

    public function boot()
    {
        /**
         * Register DI injection.
         */
        $this->registerDependencies(array_merge($this->defaultDependencies, $this->dependencies));

        /**
         * Get Route instance from DI.
         */
        $routeConfig = $this->make(\Nin\Libs\Routing\RouteConfigInterface::class);
        $this->router = $this->configureRoutes($routeConfig)->getRoute();

        /**
         * Register Facade
         */
        (new RegisterFacade())->bootstrap($this);
    }

    public function getRouterConfig(): RouteConfigInterface
    {
        return $this->routerConfig;
    }

    public function handle()
    {
        try {
            $parameters = $this->router->extractRoute();
            $controller = explode("::", $parameters['controller']);
            $controllerName = '\Nin\Controllers\\' . $controller[0];
            $actionName = $controller[1];
            $arguments = $parameters;
            array_shift($arguments);
            array_shift($arguments);


            $controller = $this->make($controllerName);
            echo $controller->$actionName(extract($arguments));
            exit;
        } catch (ResourceNotFoundException $e) {
            echo $e->getMessage();
            var_dump($e->getMessage());
            exit;
        }
    }

}
