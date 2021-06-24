<?php

require __DIR__ . '/../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Nin\Libs\Container\Application;
use Nin\Libs\Container\Container;

try {
    $application = new Application(new Container());
    $application->handle();
} catch (Exception $exception) {

}
