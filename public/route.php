<?php

require __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Router;

try {
    $fileLocator = new FileLocator(array(__DIR__ . '/../src/Config'));

    $requestContext = new RequestContext();
    $requestContext->fromRequest(Request::createFromGlobals());

    $router = new Router(
        new YamlFileLoader($fileLocator),
        'routes.yaml',
        [],
//        array('cache_dir' => __DIR__ . '/../cache'),
        $requestContext
    );
    // Find the current route
    var_dump($router);die();
    $parameters = $router->match($requestContext->getPathInfo());

    // get ..
    $routeName = $parameters['_route'];

    $controllers = explode("::", $parameters['controller']);
    $controllerName = 'Nin\Controllers\\' . $controllers[0];
    $actionName = $controllers[1];

    $arguments = $parameters;
    array_shift($arguments);
    array_shift($arguments);

    $controller = new $controllerName();
    echo $controller->$actionName(extract($arguments));
    exit;
    /*
        // How to generate a SEO URL
        $routes = $router->getRouteCollection();
        $generator = new UrlGenerator($routes, $requestContext);
        $url = $generator->generate($routeName, array(
            'id' => 123,
        ));

        echo '<pre>';
        print_r($parameters);

        echo 'Generated URL: ' . $url;
        exit;*/
} catch (ResourceNotFoundException $e) {
    echo $e->getMessage();
    var_dump($e->getMessage());
    die('s');
}
