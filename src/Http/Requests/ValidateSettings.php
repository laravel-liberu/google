<?php

namespace LaravelLiberu\Google\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSettings extends FormRequest
{
    public function rules()
    {
        return [
            'analytics_id'     => 'nullable|string|max:255',
            'ads_id'           => 'nullable|string|max:255',
            'maps_key'         => 'nullable|string|max:255',
            'maps_url'         => 'nullable|string|max:255',
            'recaptcha_key'    => 'nullable|string|max:255',
            'recaptcha_secret' => 'nullable|string|max:255',
            'tag_manager_id'   => 'nullable|string|max:255',
        ];
    }
}
