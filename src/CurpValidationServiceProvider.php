<?php

namespace Pollin14\LaravelCurpValidation;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Factory;
use Pollin14\LaravelCurpValidation\Rules\CurpBirthdate;
use Pollin14\LaravelCurpValidation\Rules\CurpGender;
use Pollin14\LaravelCurpValidation\Rules\CurpLastConsonants;
use Pollin14\LaravelCurpValidation\Rules\CurpLastDigit;
use Pollin14\LaravelCurpValidation\Rules\CurpLength;
use Pollin14\LaravelCurpValidation\Rules\CurpPenultimateChar;
use Pollin14\LaravelCurpValidation\Rules\CurpStartWithFourLetters;
use Pollin14\LaravelCurpValidation\Rules\CurpState;

class CurpValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Factory $validatorFactory)
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'curp-validation');

        $validatorFactory->extend('curp_length', CurpLength::class.'@passes');
        $validatorFactory->extend('curp_birthdate', CurpBirthdate::class.'@passes');
        $validatorFactory->extend('curp_gender', CurpGender::class.'@passes');
        $validatorFactory->extend('curp_last_digit', CurpLastDigit::class.'@passes');
        $validatorFactory->extend('curp_penultimate_char', CurpPenultimateChar::class.'@passes');
        $validatorFactory->extend('curp_state', CurpState::class.'@passes');
        $validatorFactory->extend('curp_last_consonants', CurpLastConsonants::class.'@passes');
        $validatorFactory->extend('curp_start_with_four_letters', CurpStartWithFourLetters::class.'@passes');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
