<?php

$whoops = new Whoops\Run();
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());

// Configure the PrettyPageHandler:
$handler = new \Whoops\Handler\PrettyPageHandler;

$handler->setPageTitle("It's broken!")->setEditor("phpstorm");
$whoops->pushHandler($handler);

$directory = PUBLIC_PATH . '/vendor/whoops';
$css = '/whoops-custom.css';
$handler->addResourcePath($directory);
$handler->addCustomCss($css);

//$handler->addDataTable('Killer App Details', array(
//    "Important Data" => ['sds', 'sds'],
//));
if (\Whoops\Util\Misc::isAjaxRequest()) {
    $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler);
}

// Set Whoops as the default error and exception handler used by PHP:
$whoops->register();
