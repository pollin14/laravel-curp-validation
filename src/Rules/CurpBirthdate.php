<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Rules;

use DateTime;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class CurpBirthdate implements Rule
{
    public function passes($attribute, $value)
    {
        if (!is_string($value)) {
            return false;
        }
        if (Str::length($value) < 8) {
            return false;
        }

        $date = Str::substr($value, 4, 6);

        $result = $dateTime = DateTime::createFromFormat('ymd', $date);
        if ($result === false) {
            return false;
        }

        return $dateTime->format('ymd') === $date;
    }

    public function message()
    {
        return trans('curp-validation::validation.curp_birthdate');
    }
}
