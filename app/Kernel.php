<?php

namespace App;

use Nin\Libs\Container\Kernel as BaseKernel;
use Nin\Libs\Middleware\VerifyCsrfToken;

/**
 * Class Application Kernel
 * @package App
 */
class Kernel extends BaseKernel
{
    /**
     * Middleware list
     *
     * @var array
     */
    public array $middleware = [
        VerifyCsrfToken::class
    ];
}
