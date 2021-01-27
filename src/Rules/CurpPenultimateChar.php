<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Rules;

use DateTime;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class CurpPenultimateChar implements Rule
{

    public function passes($attribute, $value)
    {
        if (!is_string($value)) {
            return false;
        }

        if (Str::length($value) < 8) {
            return false;
        }

        $dateString = Str::substr($value, 4, 6);


        $date = DateTime::createFromFormat('ymd', $dateString);

        if ($date === false) {
            return false;
        }

        $regExp = $this->getRegexp($date);
        $result = preg_match($regExp, $value);

        return $result === 1;
    }

    public function message()
    {
        return trans('curp-validation::validation.curp_penultimate_char');
    }

    private function getRegexp(DateTime $date)
    {
        $limit = DateTime::createFromFormat('Y-m-d h:i:s', '2000-01-01 00:00:00');

        if ($date < $limit) {
            return '/^.{16}\d/i';
        }

        return '/^.{16}[a-z]{1}/i';
    }
}
