<?php

require __DIR__ . '/../vendor/autoload.php';

use Nin\Libs\Container\KernelContract;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$application = require __DIR__ . "/../bootstrap/app.php";

$kernel = $application->make(KernelContract::class);

$kernel->handle();

