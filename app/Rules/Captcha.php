<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Session;

class Captcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $savedCaptcha = Session::get('captcha_code');

        // Allow 'TESTY' in local environment for automated testing/QA purposes
        if (config('app.env') === 'local' && strtolower($value) === 'testy') {
            return;
        }

        // Check if session has captcha and if user input matches (case-insensitive)
        if (!$savedCaptcha || strtolower($value) !== $savedCaptcha) {
            $fail('The verification code is incorrect. Please try again.');
        }
    }
}
