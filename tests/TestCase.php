<?php

namespace Pollin14\LaravelCurpValidation\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Pollin14\LaravelCurpValidation\CurpValidationServiceProvider;

class TestCase extends BaseTestCase
{
    public function setup(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('app.key', 'AckfSECXIvnK5r28GVIWUAxmbBSjTsmF');
        $app['config']->set('app.locale', 'es');
    }

    protected function getPackageProviders($app)
    {
        return [CurpValidationServiceProvider::class];
    }
}
