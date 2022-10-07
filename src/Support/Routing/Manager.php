<?php

namespace Administratix\Administratix\Support\Routing;

use Illuminate\Support\Collection;

class Manager
{
    /**
     * The routers loaded
     * 
     * @var Illuminate\Support\Collection
     */
    protected $routers;

    /**
     * The constructor
     * 
     * @param  \Illuminate\Support\Collection $routers
     * @return void
     */
    public function __construct()
    {
        $this->routers = Collection::make();
    }

    /**
     * The route initializer
     * 
     * @param  string $name
     * @return void
     */
    public function initializeRouter($name)
    {
        $this->routers[$name] = Collection::make();
    }

    /**
     * Add routes
     * 
     * @param  string $routeName
     * @param  \Administratix\Administratix\Support\Routing\Route $route
     * @return void
     */
    public function addRoute($routerName, $route)
    {
        $this->routers[$routerName] = $this->routers->pull($routerName)->push($route);
    }

    /**
     * Check if the router exists
     * 
     * @param  string|array $routerName
     * @return bool
     */
    public function hasRouter($routerName)
    {
        return $this->routers->has($routerName);
    }

    /**
     * Get the routes loaded from the route
     * 
     * @param string $routerName
     * @return \Illuminate\Support\Collection
     */
    public function getRoutes($routerName)
    {
        return $this->routers->get($routerName);
    }
}
