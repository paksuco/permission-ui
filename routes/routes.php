<?php


use Illuminate\Support\Facades\Route;

/**
 * Routes for the package would go here
 */

 Route::group(['prefix' => config("permission-ui.admin_route_prefix")], function () {
    Route::livewire('/roles', 'roles')->layout(config("permission-ui.template_to_extend"));
    Route::livewire('/permissions', 'permissions')->layout(config("permission-ui.template_to_extend"));
 });