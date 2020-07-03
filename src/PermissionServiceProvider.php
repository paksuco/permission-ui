<?php

namespace Paksuco\Permission;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Paksuco\Permission\Components\Permissions;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->handleConfigs();
        // $this->handleMigrations();
        $this->handleViews();
        $this->handleTranslations();
        $this->handleRoutes();

        Event::listen("paksuco.menu.beforeRender", function($manager){
            $manager->menu("admin")->addItem("Permission", route("paksuco.permissions"), "fa fa-lock");
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Bind any implementations.

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function handleConfigs()
    {
        $configPath = __DIR__ . '/../config/permission-ui.php';

        $this->publishes([$configPath => config_path('permission-ui.php')]);

        $this->mergeConfigFrom($configPath, 'permission-ui');
    }

    private function handleTranslations()
    {
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'permission-ui');
    }

    private function handleViews()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'permission-ui');

        $this->publishes([__DIR__.'/../views' => base_path('resources/views/vendor/permission-ui')]);

        Livewire::component('permission-ui::permissions', \Paksuco\Permission\Components\Permissions::class);
        Livewire::component('permission-ui::permission-actions', \Paksuco\Permission\Components\PermissionActions::class);
        Livewire::component('permission-ui::role-actions', \Paksuco\Permission\Components\RoleActions::class);
    }

    private function handleMigrations()
    {
        $this->publishes([__DIR__ . '/../migrations' => base_path('database/migrations')]);
    }

    private function handleRoutes()
    {
        include __DIR__.'/../routes/routes.php';
    }
}
