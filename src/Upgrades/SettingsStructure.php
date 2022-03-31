<?php

namespace LaravelEnso\Google\Upgrades;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use LaravelEnso\Upgrade\Contracts\MigratesTable;
use LaravelEnso\Upgrade\Helpers\Column;

class SettingsStructure implements MigratesTable
{
    public function isMigrated(): bool
    {
        return Column::getLength('google_settings', 'ads_id') === 300;
    }

    public function migrateTable(): void
    {
        Schema::table('google_settings', function (Blueprint $table) {
            $table->string('ads_id', 300)->nullable()->change();
            $table->string('maps_key', 300)->nullable()->change();
            $table->string('recaptcha_key', 300)->nullable()->change();
            $table->string('recaptcha_secret', 300)->nullable()->change();
        });
    }
}
