<?php

namespace LaravelEnso\Google\Upgrades;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use LaravelEnso\Google\Models\Settings;
use LaravelEnso\Upgrade\Contracts\MigratesTable;
use LaravelEnso\Upgrade\Helpers\Table;

class RecaptchaUrl implements MigratesTable
{
    public function isMigrated(): bool
    {
        return Table::hasColumn('google_settings', 'recaptcha_url');
    }

    public function migrateTable(): void
    {
        Schema::table('google_settings', fn (Blueprint $table) => $table
            ->string('recaptcha_url', 300)
            ->after('recaptcha_secret')
            ->nullable());

        $url = 'https://www.google.com/recaptcha/api/siteverify';

        Settings::current()->update(['recaptcha_url' => $url]);
    }
}
