<?php

namespace IlyasKazi\Instamojo;

use Illuminate\Support\ServiceProvider;

class InstamojoServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap services.
    *
    * @return void
    */
    public function boot()
    {
        //
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    /**
    * Register services.
    *
    * @return void
    */
    public function register()
    {
        // register our controller
        $this->app->make('IlyasKazi\Instamojo\Controllers\InstamojoController');
    }
}
