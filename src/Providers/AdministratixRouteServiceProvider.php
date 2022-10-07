<?php


namespace Administratix\Administratix\Providers;

use Administratix\Administratix\Support\Helpers\Boot;

class AdministratixRouteServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Boot::loadRouteManager($this->app);

    
        
    }
}