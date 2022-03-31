<?php

namespace LaravelEnso\Google\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Google\Database\Factories\SettingsFactory;
use LaravelEnso\Helpers\Casts\Encrypt;
use LaravelEnso\Rememberable\Traits\Rememberable;

class Settings extends Model
{
    use HasFactory;
    use Rememberable;

    protected $table = 'google_settings';

    protected $guarded = ['id'];

    protected $casts = [
        'maps_key'         => Encrypt::class,
        'recaptcha_key'    => Encrypt::class,
        'recaptcha_secret' => Encrypt::class,
        'analytics_id'     => Encrypt::class,
    ];

    private static $instance;

    public static function current()
    {
        return self::$instance
            ??= self::cacheGet(1)
            ?? self::factory()->create();
    }

    public static function googleRecaptchaSecret(): ?string
    {
        return self::current()->recaptcha_secret;
    }

    public static function tagManagerId(): ?string
    {
        return self::current()->tag_manager_id;
    }

    public static function mapsKey(): ?string
    {
        return self::current()->maps_key;
    }

    public static function mapsURL(): ?string
    {
        return self::current()->maps_url;
    }

    protected static function newFactory()
    {
        return SettingsFactory::new();
    }
}
