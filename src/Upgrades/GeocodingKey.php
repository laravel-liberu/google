<?php

namespace LaravelEnso\Google\Upgrades;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use LaravelEnso\Upgrade\Contracts\MigratesTable;
use LaravelEnso\Upgrade\Helpers\Table;

class GeocodingKey implements MigratesTable
{
    public function isMigrated(): bool
    {
        return Table::hasColumn('google_settings', 'geocoding_key');
    }

    public function migrateTable(): void
    {
        Schema::table('google_settings', fn (Blueprint $table) => $table
            ->string('geocoding_key', 300)
            ->after('maps_key')
            ->nullable());
    }
}
