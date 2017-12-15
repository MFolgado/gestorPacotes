<?php

namespace Blit\Accounts\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AccountServiceProvider extends ServiceProvider
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
        $configDir      = __DIR__ . '/../Config/blit-accounts.php';
        $migrationsDir  = __DIR__ . '/../Migrations';
        $viewsDir       = __DIR__ . '/../Views';
        $publicDir      = __DIR__ . '/../assets';



        Route::namespace("Blit\\Accounts\\Http\\Controllers")
        ->middleware(config('BlitAccounts.route_middleware'))
        ->group($routeDir);

        $this->loadMigrationsFrom($migrationsDir);
        $this->loadTranslationsFrom($langDir,'BlitAccounts');
        $this->loadViewsFrom($viewsDir,'BlitAccounts');

        $this->publishes([$langDir => resource_path('lang/vendor/BlitAccounts')],'BlitAccounts-lang');
        $this->publishes([$viewsDir => resource_path('views/vendor/BlitAccounts')],'BlitAccounts-views');
        $this->publishes([$publicDir => public_path('vendor/BlitAccounts')],'BlitAccounts-assets');
        $this->publishes([$configDir => config_path('blit-accounts.php')],'BlitAccounts-config');


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/blit-accounts.php','BlitAccounts');
    }
}