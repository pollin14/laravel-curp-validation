<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Tests\Unit\Rules;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Validation\Factory;
use Pollin14\LaravelCurpValidation\Rules\CurpLength;
use Pollin14\LaravelCurpValidation\Tests\TestCase;

class CurpLengthTest extends TestCase
{
    /**
     * @throws BindingResolutionException
     * @dataProvider dataProviderCurp
     */
    public function testPass($curp, $result)
    {
        $validator = app(Factory::class)->make(
            ['curp' => $curp],
            ['curp' => ['required', new CurpLength()]]
        );

        $this->assertEquals($result, $validator->passes());
    }

    public function testMessage()
    {
        $rule = new CurpLength();
        $this->assertEquals('La CURP debe ser de exactamente 18 caracteres.', $rule->message());
    }

    public function dataProviderCurp()
    {
        return [
            ['', false],
            ['123', false],
            [111, false],
            ['ROCE000131HNLDNDA01', false],
            ['ROCA000131MNLDNDA0', true],
        ];
    }
}
