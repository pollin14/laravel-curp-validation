<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class CurpGender implements Rule
{

    public function passes($attribute, $value)
    {
        if (!is_string($value)) {
            return false;
        }
        if (Str::length($value) < 11) {
            return false;
        }

        $result = preg_match('/^.{10}H|M/i', $value);

        return $result === 1;
    }

    public function message()
    {
        return trans('curp-validation::validation.curp_gender');
    }
}
