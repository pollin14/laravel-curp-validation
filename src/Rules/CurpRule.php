<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Rules;

use Illuminatech\Validation\Composite\CompositeRule;

class CurpRule extends CompositeRule
{
    protected function rules(): array
    {
        return [
            'curp_length',
            'curp_gender',
            'curp_start_with_four_letters',
            'curp_last_digit',
            'curp_penultimate_char',
            'curp_state',
            'curp_birthdate',
            'curp_last_consonants',
        ];
    }
}
