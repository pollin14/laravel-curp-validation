<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Tests\Unit\Rules;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Validation\Factory;
use Pollin14\LaravelCurpValidation\Rules\CurpStartWithFourLetters;
use Pollin14\LaravelCurpValidation\Tests\TestCase;

class CurpStartWithFourLettersTest extends TestCase
{
    /**
     * @throws BindingResolutionException
     * @dataProvider dataProviderCurp
     */
    public function testPass($curp, $result)
    {
        $validator = app(Factory::class)->make(
            ['curp' => $curp],
            ['curp' => ['required', new CurpStartWithFourLetters()]]
        );

        $this->assertEquals($result, $validator->passes());
    }

    public function testMessage()
    {
        $rule = new CurpStartWithFourLetters();
        $this->assertEquals('La CURP debe empezar con 4 letras.', $rule->message());
    }

    public function dataProviderCurp()
    {
        return [
            ['', false],
            [111, false],
            ['ROCE000131HNLDNDA0', true],
            ['ROC1000131HNLDNDA0', false],
            ['1UGV880415HDFGNC07', false],
        ];
    }
}
