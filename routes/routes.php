<?php

use Illuminate\Support\Facades\Route;

/**
 * Routes for the package would go here
 */

Route::group([
    'layout' => config("permission-ui.template_to_extend", "layouts.app"),
    'prefix' => config("permission-ui.admin_route_prefix", ""),
    'as' => 'paksuco.',
], function () {
    Route::livewire('/permissions', "permission-ui::permissions")->name("permissions")->middleware(config("permission-ui.middleware", []));
});
