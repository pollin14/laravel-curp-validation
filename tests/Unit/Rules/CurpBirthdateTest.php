<?php
declare(strict_types=1);

namespace Pollin14\LaravelCurpValidation\Tests\Unit\Rules;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Validation\Factory;
use Pollin14\LaravelCurpValidation\Rules\CurpBirthdate;
use Pollin14\LaravelCurpValidation\Tests\TestCase;

class CurpBirthdateTest extends TestCase
{
    /**
     * @throws BindingResolutionException
     * @dataProvider dataProviderCurp
     */
    public function testPass($curp, $result)
    {
        $validator = app(Factory::class)->make(
            ['curp' => $curp],
            ['curp' => ['required', new CurpBirthdate()]]
        );

        $this->assertEquals($result, $validator->passes());
    }

    public function testMessage()
    {
        $rule = new CurpBirthdate();
        $this->assertEquals('La CURP no tiene una fecha válida.', $rule->message());
    }

    public function dataProviderCurp()
    {
        return [
            ['', false],
            ['123', false],
            [111, false],
            ['asdfasdf', false],
            ['ROCE000131HNLDNDA0', true],
            ['ROCA880415MNLDNDA0', true],
            ['ROCA000132ANLDNDA0', false],
            ['ROCA001321ANLDNDA0', false],
        ];
    }
}
