<?php

namespace Italofantone\Commentable\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Load migrations from the testing package
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // Load migrations from the package
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');   
    }

    // ...
}