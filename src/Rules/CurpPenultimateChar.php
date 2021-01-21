<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Rules;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
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

        try {
            $date = Carbon::createFromFormat('ymd', $dateString);
        } catch (InvalidFormatException $exception) {
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

    private function getRegexp(Carbon $date)
    {
        if ($date->isBefore(Carbon::parse('2000-01-01 00:00:00'))) {
            return '/^.{16}\d/i';
        }

        return '/^.{16}[a-z]{1}/i';
    }
}
