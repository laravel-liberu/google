<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForGoogleMenu extends Migration
{
    protected array $menu = [
        'name' => 'Google', 'icon' => 'fab google', 'route' => null, 'order_index' => 500, 'has_children' => true,
    ];

    protected ?string $parentMenu = 'Integrations';
}
