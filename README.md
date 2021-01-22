# Laravel CURP Validations

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![codecov](https://codecov.io/gh/pollin14/laravel-curp-validation/branch/master/graph/badge.svg)](https://codecov.io/gh/pollin14/laravel-curp-validation)
[![Workflow](https://github.com/pollin14/laravel-curp-validation/workflows/PHP%20Composer/badge.svg)]()
[![Total Downloads](https://img.shields.io/packagist/dt/pollin14/laravel-curp-validation.svg?style=flat-square)](https://packagist.org/packages/pollin14/laravel-curp-validation)

A set of validation rules specific to validate Mexico's CURP.

It requires Laravel >= 5 and PHP >= 7.2.

## Install

```bash
composer require pollin14/laravel-curp-validation
```

## Usage

If you are using Laravel >= 6 you can install

```bash
composer require illuminatech/validation-composite
```

and use `CurpRule`.

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
use Pollin14\LaravelCurpValidation\Rules\CurpBirthdate;
use Pollin14\LaravelCurpValidation\Rules\CurpGender;
use Pollin14\LaravelCurpValidation\Rules\CurpLastConsonants;
use Pollin14\LaravelCurpValidation\Rules\CurpLastDigit;
use Pollin14\LaravelCurpValidation\Rules\CurpLength;
use Pollin14\LaravelCurpValidation\Rules\CurpPenultimateChar;
use Pollin14\LaravelCurpValidation\Rules\CurpStartWithFourLetters;
use Pollin14\LaravelCurpValidation\Rules\CurpState;

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

// Or if you are using Lumen
$rules = [
    new CurpLength(),
    new CurpGender(),
    new CurpStartWithFourLetters(),
    new CurpLastDigit(),
    new CurpPenultimateChar(),
    new CurpState(),
    new CurpBirthdate(),
    new CurpLastConsonants(),
] 

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
