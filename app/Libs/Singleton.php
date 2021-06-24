<?php

namespace App\Libs;

class Singleton
{
    private static $_instances = [];

    protected function __construct()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    protected function __clone()
    {
    }

    public static function getInstance()
    {
        $subClass = static::class;
        if (!isset(self::$_instances[$subClass])) {
            self::$_instances[$subClass] = new static();
        }
        return self::$_instances[$subClass];
    }
}
