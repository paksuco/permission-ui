<?php


use Illuminate\Routing\Route;

/**
 * Routes for the package would go here
 */

 Route::group(['prefix' => config("permission-ui.admin_route_prefix")], function () {
    Route::livewire('roles')->layout(config("permission-ui.template_to_extend"));
    Route::livewire('permissions')->layout(config("permission-ui.template_to_extend"));
 });