<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Tests\Unit\Rules;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Validation\Factory;
use Pollin14\LaravelCurpValidation\Rules\CurpPenultimateChar;
use Pollin14\LaravelCurpValidation\Tests\TestCase;

class CurpPenultimateCharTest extends TestCase
{
    /**
     * @throws BindingResolutionException
     * @dataProvider dataProviderCurp
     */
    public function testPass($curp, $result)
    {
        $validator = app(Factory::class)->make(
            ['curp' => $curp],
            ['curp' => ['required', new CurpPenultimateChar()]]
        );

        $this->assertEquals($result, $validator->passes());
    }

    public function testMessage()
    {
        $rule = new CurpPenultimateChar();
        $message = 'El penúltimo carácter de la CURP de es valido. Para personas que nacieron '.
            'antes del año 2000 debe ser un dígito, para las que nacieron después debe ser una letra.';
        $this->assertEquals($message, $rule->message());
    }

    public function dataProviderCurp()
    {
        return [
            ['', false],
            ['123', false],
            [111, false],
            ['ROCE880131HNLDND07', true],
            ['ROCE000131HNLDNDA0', true],
            ['ROCA000131MNLDNDAA', true],
            ['ROCA880131ANLDNDAA', false],
            ['ROCA88A131ANLDNDAA', false],
        ];
    }
}
