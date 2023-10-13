<?php

namespace LaravelLiberu\Google\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use LaravelLiberu\Google\Models\Settings as Model;

class SettingsFactory extends Factory
{
    protected $model = Model::class;

    public function definition()
    {
        return [
            'analytics_id'     => null,
            'ads_id'           => null,
            'maps_key'         => null,
            'maps_url'         => null,
            'recaptcha_key'    => null,
            'recaptcha_secret' => null,
            'tag_manager_id'   => null,
        ];
    }
}
