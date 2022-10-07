<?php

namespace Administratix\Administratix\Facades\Routing;

use Administratix\Administratix\Support\Routing\Manager;
use Illuminate\Support\Facades\Facade;

class RouteManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() 
    { 
        return Manager::class; 
    }
}