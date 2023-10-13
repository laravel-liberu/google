<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Google\Http\Controllers\Settings\Index;
use LaravelLiberu\Google\Http\Controllers\Settings\Update;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/integrations/google/settings')
    ->as('integrations.google.settings.')
    ->group(function () {
        Route::get('', Index::class)->name('index');
        Route::patch('{settings}', Update::class)->name('update');
    });
