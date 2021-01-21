<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Tests\Unit\Rules;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Validation\Factory;
use Pollin14\LaravelCurpValidation\Rules\CurpGender;
use Pollin14\LaravelCurpValidation\Tests\TestCase;

class CurpGenderTest extends TestCase
{
    /**
     * @throws BindingResolutionException
     * @dataProvider dataProviderCurp
     */
    public function testPass($curp, $result)
    {
        $validator = app(Factory::class)->make(
            ['curp' => $curp],
            ['curp' => ['required', new CurpGender()]]
        );

        $this->assertEquals($result, $validator->passes());
    }

    public function testMessage()
    {
        $rule = new CurpGender();
        $this->assertEquals('La letra para el genero de la CURP debe ser H o M.', $rule->message());
    }

    public function dataProviderCurp()
    {
        return [
            ['', false],
            ['123', false],
            [111, false],
            ['ROCE000131HNLDNDA0', true],
            ['ROCA000131MNLDNDA0', true],
            ['ROCA000131ANLDNDA0', false],
        ];
    }
}
