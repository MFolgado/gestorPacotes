<?php

namespace Blit\Roles\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $langDir        = __DIR__ . '/../Lang';
        $routeDir       = __DIR__ . '/../Routes/web.php';
        $configDir      = __DIR__ . '/../Config/blit-roles.php';
        $migrationsDir  = __DIR__ . '/../Migrations';
        $viewsDir       = __DIR__ . '/../Views';
        $publicDir      = __DIR__ . '/../assets';

        Route::namespace("Blit\\Roles\\Http\\Controllers")
        ->middleware(config('BlitRoles.route_middleware'))
        ->group($routeDir);

        $this->loadMigrationsFrom($migrationsDir);
        $this->loadTranslationsFrom($langDir,'BlitRoles');
        $this->loadViewsFrom($viewsDir,'BlitRoles');

        $this->publishes([$langDir => resource_path('lang/vendor/BlitRoles')],'BlitRoles-lang');
        $this->publishes([$viewsDir => resource_path('views/vendor/BlitRoles')],'BlitRoles-views');
        $this->publishes([$publicDir => public_path('vendor/BlitRoles')],'BlitRoles-assets');
        $this->publishes([$configDir => config_path('blit-roles.php')],'BlitRoles-config');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/blit-roles.php','BlitRoles');
    }
}