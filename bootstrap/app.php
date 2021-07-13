<?php

use Nin\Libs\Config\Config;
use Nin\Libs\Config\ConfigContract as ConfigContract;
use Nin\Libs\Container\Application;
use Nin\Libs\Container\Container;
use Nin\Libs\Exceptions\ExceptionHandleContract;
use Nin\Libs\Exceptions\ExceptionHandle;

/**
 * Declare Constant
 */

define('APP_ROOT_DIR', __DIR__ . "/../src");
define('ROOT', __DIR__ . "/../");
define('PUBLIC_PATH', __DIR__ . "/../public");

require __DIR__ . "/whoops.php";

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(ROOT);
$dotenv->load();


$application = new Application(new Container());

/**
 * Bind Important Interfaces
 */
/**
 * Config
 */
$application->singleton(ConfigContract::class, Config::getInstance());

/**
 * Exception Handle
 */
$application->singleton(ExceptionHandleContract::class, new ExceptionHandle($application));

$application->boot();

return $application;
