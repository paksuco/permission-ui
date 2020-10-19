<?php

use Illuminate\Support\Facades\Route;

/**
 * Routes for the package would go here
 */

Route::group([
    'prefix' => config("permission-ui.admin_route_prefix", ""),
    'as' => 'paksuco.',
], function () {
    Route::get('/permissions', \Paksuco\Permission\Components\Permissions::class)
        ->name("permissions")
        ->middleware(config("permission-ui.middleware", []));
});
