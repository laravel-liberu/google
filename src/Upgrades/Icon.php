<?php

namespace LaravelEnso\Google\Upgrades;

use LaravelEnso\Menus\Models\Menu;
use LaravelEnso\Upgrade\Contracts\MigratesData;

class Icon implements MigratesData
{
    public function isMigrated(): bool
    {
        return Menu::whereHas('permission', fn ($permission) => $permission
            ->whereName('integrations.google.settings.index'))
            ->whereIcon('fas user-cog')
            ->exists();
    }

    public function migrateData(): void
    {
        Menu::whereHas('permission', fn ($permission) => $permission
            ->whereName('integrations.google.settings.index'))
            ->whereIcon('fad user-cog')
            ->update(['icon' => 'fas user-cog']);
    }
}
