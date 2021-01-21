<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Rules;

use Illuminate\Contracts\Validation\Rule;

class CurpState implements Rule
{

    public function passes($attribute, $value)
    {
        if (!is_string($value)) {
            return false;
        }

        $result = preg_match('/^.{11}[a-z]{2}/i', $value);

        return $result === 1;
    }

    public function message()
    {
        return trans('curp-validation::validation.curp_state');
    }
}
