<?php

namespace Raffles\Modules\Aptoclick\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('aptoclick', 'Resources/Lang', 'app'), 'aptoclick');
        $this->loadViewsFrom(module_path('aptoclick', 'Resources/Views', 'app'), 'aptoclick');
        $this->loadMigrationsFrom(module_path('aptoclick', 'Database/Migrations', 'app'), 'aptoclick');
        $this->loadConfigsFrom(module_path('aptoclick', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('aptoclick', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(MifielServiceProvider::class);
    }
}
