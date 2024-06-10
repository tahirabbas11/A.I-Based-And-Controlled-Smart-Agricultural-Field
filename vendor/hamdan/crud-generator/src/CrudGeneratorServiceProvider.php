<?php

namespace Hamdan\CrudGenerator;

use File;
use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/crudgenerator.php' => config_path('crudgenerator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/crud-generator/'),
        ]);

        /** Code By HAMDAN */

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        if (File::exists(base_path('resources/laravel-admin/menus.json'))) {
            $menus = json_decode(File::get(base_path('resources/laravel-admin/menus.json')));
            view()->share('laravelAdminMenus', $menus);
         /** Code By HAMDAN */
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */ 
    public function register()
    {
        $this->app->make('Hamdan\CrudGenerator\Controllers\ProcessController');
        $this->loadViewsFrom(__DIR__ . '/views','hamdan');
        $this->commands(
            'Hamdan\CrudGenerator\Commands\CrudCommand',
            'Hamdan\CrudGenerator\Commands\CrudControllerCommand',
            'Hamdan\CrudGenerator\Commands\CrudModelCommand',
            'Hamdan\CrudGenerator\Commands\CrudMigrationCommand',
            'Hamdan\CrudGenerator\Commands\CrudViewCommand',
            'Hamdan\CrudGenerator\Commands\CrudLangCommand',
            'Hamdan\CrudGenerator\Commands\CrudApiCommand',
            'Hamdan\CrudGenerator\Commands\CrudApiControllerCommand'
        );
        
    }
}
