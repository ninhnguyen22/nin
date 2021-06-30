<?php

namespace Nin\Libs\Facades;

class Auth extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Nin\Libs\Auth\AuthManagerFactory::class;
    }

}
