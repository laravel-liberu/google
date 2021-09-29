<?php

namespace LaravelEnso\Google\Upgrades;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use LaravelEnso\Google\Database\Factories\SettingsFactory;
use LaravelEnso\Google\Models\Settings as Model;
use LaravelEnso\Upgrade\Contracts\Applicable;
use LaravelEnso\Upgrade\Contracts\MigratesData;
use LaravelEnso\Webshop\Models\Settings as WebshopSettings;

class Settings implements MigratesData, Applicable
{
    public function applicable(): bool
    {
        return class_exists(WebshopSettings::class);
    }

    public function isMigrated(): bool
    {
        return Schema::hasTable('google_settings') && Model::exists();
    }

    public function migrateData(): void
    {
        $settings = WebshopSettings::first();

        (new Model())->setRawAttributes([
            'analytics_id' => $settings->google_analytics_id,
            'ads_id' => $settings->google_ads_id,
            'maps_key' => $settings->google_maps_key,
            'maps_url' => $this->mapsUrl(),
            'recaptcha_key' => $settings->google_recaptcha_key,
            'recaptcha_secret' => $settings->google_recaptcha_secret,
            'tag_manager_id' => $settings->google_tag_manager_id,
        ])->save();
    }

    private function mapsUrl(): string
    {
        return Config::get('enso.addresses.googleMaps.url')
            ?? 'https://maps.googleapis.com/maps/api/geocode/json';
    }

    protected static function newFactory()
    {
        return SettingsFactory::new();
    }
}
