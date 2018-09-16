<?php namespace IlyasKazi\Instamojo;

class InstamojoServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
    * Bootstrap services.
    *
    * @return void
    */
    public function boot()
    {
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
