<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class CurpLength implements Rule
{
    public function passes($attribute, $value)
    {
        if (!is_string($value)) {
            return false;
        }

        return Str::length($value) === 18;
    }

    public function message()
    {
        return trans('curp-validation::validation.curp_length');
    }
}
