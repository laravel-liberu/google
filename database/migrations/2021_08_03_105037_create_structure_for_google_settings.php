<?php

use LaravelLiberu\Migrator\Database\Migration;

return new class extends Migration
{
    protected ?string $parentMenu = 'Google';

    protected array $menu = [
        'name' => 'Settings', 'icon' => 'fas user-cog', 'route' => 'integrations.google.settings.index', 'order_index' => 100, 'has_children' => false,
    ];

    protected array $permissions = [
        ['name' => 'integrations.google.settings.index', 'description' => 'Show settings for Google', 'is_default' => false],
        ['name' => 'integrations.google.settings.update', 'description' => 'Update Google settings', 'is_default' => false],
    ];
};
