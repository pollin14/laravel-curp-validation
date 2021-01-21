<?php

namespace Pollin14\LaravelCurpValidation;

use Illuminate\Support\Facades\Facade;

class LaravelCurpValidationFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-curp-validation';
    }
}
