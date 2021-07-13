<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function createApplication()
    {
        return require __DIR__ . '/../bootstrap/app.php';
    }
}
