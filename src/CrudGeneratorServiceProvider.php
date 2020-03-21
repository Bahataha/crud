<?php

namespace Duke\CrudGenerator;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'Duke\CrudGenerator\Commands\CrudCommand',
            'Duke\CrudGenerator\Commands\CrudControllerCommand',
            'Duke\CrudGenerator\Commands\CrudModelCommand',
            'Duke\CrudGenerator\Commands\CrudMigrationCommand',
            'Duke\CrudGenerator\Commands\CrudViewCommand',
            'Duke\CrudGenerator\Commands\CrudExport',
            'Duke\CrudGenerator\Commands\CrudImport',
            'Duke\CrudGenerator\Commands\CrudTest'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/2014_10_12_000000_create_users_table.php' => database_path('migrations/2014_10_12_000000_create_users_table.php'),
            __DIR__ . '/../config/AppServiceProvider.php' => base_path('app/Providers/AppServiceProvider.php'),
            __DIR__ . '/../config/AdminController.php' => base_path('app/Http/Controllers/Admin/AdminController.php'),
            __DIR__ . '/../config/isAdmin.php' => base_path('app/Http/Middleware/isAdmin.php'),
            __DIR__ . '/../publish/views/' => base_path('resources/views/'),
            __DIR__ . '/../publish/css/' => public_path('css/'),
            __DIR__ . '/../publish/js/' => public_path('js/'),
            __DIR__ . '/stubs/' => base_path('resources/crud-generator/'),
            __DIR__ . '/../config/web.php' => base_path('routes/web.php'),
            __DIR__ . '/../config/filesystems.php' => config_path('filesystems.php'),
            __DIR__ . '/../config/crudgenerator.php' => config_path('crudgenerator.php'),
            __DIR__ . '/../config/excel.php' => config_path('excel.php'),
        ]);
    }
}
