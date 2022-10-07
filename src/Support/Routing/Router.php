<?php

namespace Administratix\Administratix\Support\Routing;

use Illuminate\Support\Collection;

class Router 
{
    /**
     * The sidebar name
     * 
     * @var string
     */
    protected $name;

    /**
     * The routes collection
     * 
     * @var \Illuminate\Support\Collection
     */
    protected $routes;

    /**
     * The constructor of the class
     * 
     * @param  string $name
     * @param  \Illuminate\Support\Collection
     * @return void
     */
    public function __construct($name = null, $routes = null)
    {
        $this->name = $name;
        $this->routes = $routes ?: Collection::make();
    }

    /**
     * Push the new routes
     * 
     * @return \Illuminate\Support\Collection
     */
    public function addRoute($route)
    {
        return $this->routes->push($route);
    }
}