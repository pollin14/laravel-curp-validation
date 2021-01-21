<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Tests\Unit\Rules;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Validation\Factory;
use Pollin14\LaravelCurpValidation\Rules\CurpLastConsonants;
use Pollin14\LaravelCurpValidation\Tests\TestCase;

class CurpLastConsonantsTest extends TestCase
{
    /**
     * @throws BindingResolutionException
     * @dataProvider dataProviderCurp
     */
    public function testPass($curp, $result)
    {
        $validator = app(Factory::class)->make(
            ['curp' => $curp],
            ['curp' => ['required', new CurpLastConsonants()]]
        );

        $this->assertEquals($result, $validator->passes());
    }

    public function testMessage()
    {
        $rule = new CurpLastConsonants();
        $this->assertEquals('La CURP debe tener 3 consonantes en la posición 13.', $rule->message());
    }

    public function dataProviderCurp()
    {
        return [
            ['', false],
            ['123', false],
            [111, false],
            ['ROCE000131HNLDNDA0', true],
            ['ROCA000131MNLDNAA0', false],
            ['ROCA000131ANL1NAA0', false],
        ];
    }
}
