<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Tests\Unit\Rules;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Validation\Factory;
use Pollin14\LaravelCurpValidation\Rules\CurpLastDigit;
use Pollin14\LaravelCurpValidation\Tests\TestCase;

class CurpLastDigitTest extends TestCase
{
    /**
     * @throws BindingResolutionException
     * @dataProvider dataProviderCurp
     */
    public function testPass($curp, $result)
    {
        $validator = app(Factory::class)->make(
            ['curp' => $curp],
            ['curp' => ['required', new CurpLastDigit()]]
        );

        $this->assertEquals($result, $validator->passes());
    }

    public function testMessage()
    {
        $rule = new CurpLastDigit();
        $this->assertEquals('El último carácter de la CURP debe ser un dígito.', $rule->message());
    }

    public function dataProviderCurp()
    {
        return [
            ['', false],
            ['123', false],
            [111, false],
            ['ROCE000131HNLDNDA0', true],
            ['ROCA000131MNLDNDAA', false],
            ['ROCE000131HNLDNDA01', false],
        ];
    }
}
