<?php

namespace Nin\Libs\Facades;

use Nin\Libs\Container\Application;

class Facade
{
    protected static Application $app;

    public static function setFacadeApplication($app)
    {
        static::$app = $app;
    }

    /**
     * The resolved object instances.
     *
     * @var array
     */
    protected static array $resolvedInstance;

    protected static function resolveFacadeInstance($instance)
    {
        if (is_object($instance)) {
            return $instance;
        }

        if (isset(static::$resolvedInstance[$instance])) {
            return static::$resolvedInstance[$instance];
        }

        if (static::$app) {
            return static::$resolvedInstance[$instance] = static::$app->make($instance);
        }
    }

    public static function getFacadeRoot()
    {
        return static::resolveFacadeInstance(static::getFacadeAccessor());
    }

    public static function __callStatic($method, $args)
    {
        $instance = static::getFacadeRoot();

        if (!$instance) {
            throw new \Exception('A facade root has not been set.');
        }

        return $instance->$method(...$args);
    }

}
