# Laravel CURP Validations

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://img.shields.io/travis/pollin14/laravel-curp-validation.svg?style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/pollin14/laravel-curp-validation.svg?style=flat-square)](https://packagist.org/packages/pollin14/laravel-curp-validation)

A set of validation rules specific to validate Mexico's CURP.

## Install

```bash
composer require pollin14/laravel-curp-validation
```

## Usage

```php
<?php

use Illuminate\Contracts\Validation\Factory;
use Pollin14\LaravelCurpValidation\Rules\CurpRule;

$validator = app(Factory::class)->make(
            ['curp' => 'ABCD123456HABCDEF01'],
            ['curp' => ['required', new CurpRule()]]
        );

```

Of course, you can use the validations rules individuality

```php
<?php 

use Illuminate\Contracts\Validation\Factory;

$rules = [
    'curp_length',
    'curp_date',
    'curp_gender',
    'curp_start_with_4_letters',
    'curp_last_digit',
    'curp_penultimate_char',
    'curp_state',
    'curp_birthdate'
];

$validator = app(Factory::class)->make(
            ['curp' => 'ABCD123456HABCDEF01'],
            ['curp' => $rules]
        );

```

## Testing

Run the tests with:

```bash
vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email victor.aguilar@ciencias.unam.mx instead of using the issue
tracker.

## License

The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.
