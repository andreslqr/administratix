<?php

namespace Administratix\Administratix\Support\Helpers;

use Administratix\Administratix\Facades\Routing\RouteManager;
use Administratix\Administratix\Support\Routing\Manager;
use Administratix\Administratix\Support\Routing\Route as RoutingRoute;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class Boot
{
    /**
     * Load the Route manager 
     * 
     * @return void
     */
    public static function loadRouteManager($app)
    {
        $app->singleton(RouteManager::class, fn($app) => new Manager);

        foreach($app->config['administratix.routes.types'] as $router)
        {
            RouteManager::initializeRouter($router);
             
            Route::macro($router, function( $method, 
                                            $uri, 
                                            $action = null, 
                                            $name = null,
                                            $permissions = [],
                                            $display = null,
                                            $iconComponent = null, 
                                            $iconName = null) use ($router) {
                                        
                $this->addRoute(Arr::wrap(strtoupper($method)), $uri, $action)->name($name);
                         
                if(strtoupper($method) == 'GET')
                    RouteManager::addRoute($router, new RoutingRoute($name, $display ?: __($name), $permissions, $iconComponent, $iconName));
            });
        }
    }
}