<?php

use Nin\Libs\ORM\ORMManagerContract;

$app = require_once __DIR__ . "/../bootstrap/app.php";

$orm = $app->make(ORMManagerContract::class);

function getEntityManager(ORMManagerContract $orm)
{
    return $orm->getEntityManager();
}

$entityManager = getEntityManager($orm);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
