<?php


namespace Administratix\Administratix\Providers;

use Administratix\Administratix\Facades\Routing\RouteManager;
use Administratix\Administratix\Facades\Routing\Router;
use Administratix\Administratix\Support\Helpers\Boot;
use Administratix\Administratix\Support\Routing\Manager;
use Administratix\Administratix\Support\Routing\Route as RoutingRoute;
use Administratix\Administratix\Support\Routing\Router as RoutingRouter;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

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