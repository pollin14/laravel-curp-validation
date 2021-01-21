<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Tests\Feature\Rules;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Validation\Factory;
use Pollin14\LaravelCurpValidation\Rules\CurpRule;
use Pollin14\LaravelCurpValidation\Tests\TestCase;

class CurpRuleTest extends TestCase
{
    /**
     * @throws BindingResolutionException
     * @dataProvider dataProviderValidCurp
     */
    public function testValid($curp, $expected)
    {
        $validator = app(Factory::class)->make(
            ['curp' => $curp],
            ['curp' => ['required', new CurpRule()]]
        );

        $this->assertEquals($expected, $validator->passes());
    }

    public function dataProviderValidCurp()
    {
        return [
            ['ROCE000131HNLDNDA0', true],
            ['rose000131hnldnda0', true],
            ['rose000131hnldnda01', false],
        ];
    }
}
