<?php

namespace LaravelEnso\Google\Validation;

use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Support\Facades\Http;
use LaravelEnso\Google\Models\Settings;

class Recaptcha implements InvokableRule
{
    public function __invoke($attribute, $value, $fail)
    {
        $url = Settings::recaptchaUrl();

        $params = [
            'secret' => Settings::recaptchaSecret(),
            'response' => $value,
        ];

        $query = http_build_query($params);

        $fails = ! Http::post("{$url}?{$query}")->json('success');

        if ($fails) {
            $fail(__('Recaptcha verification has failed'));
        }
    }
}
