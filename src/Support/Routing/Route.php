<?php

namespace Administratix\Administratix\Support\Routing;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class Route 
{
    /**
     * The name of the route
     * 
     * @var string
     */
    protected $name;

    /**
     * The display for the menu
     * 
     * @var string
     */
    protected $display;

    /**
     * The icon component for the menu item
     * 
     * @var string
     */
    protected $iconComponent;

    /**
     * The icon name for the menu item
     * 
     * @var string
     */
    protected $iconName;

    /**
     * The subroutes of the menu item
     * 
     * @var \Administratix\Administratix\Support\Routing\Route[]
     */
    protected $subRoutes;

    /**
     * The permisssion needed
     * 
     * @var array
     */
    protected array $permissions;


    /**
     * The constructor of the class
     * 
     * @param  string $name
     * @param  array|string $permissions
     * @param  string $iconComponent
     * @param  string $iconName
     * @param  \Administratix\Administratix\Support\Routing\Route[] $subRoutes;
     */
    public function __construct($name, $display = null, $permissions, $iconComponent, $iconName, $subRoutes = [])
    {
        $this->name = $name;
        $this->display = $display;
        $this->permissions = Arr::wrap($permissions);
        $this->iconComponent = $iconComponent;
        $this->iconName = $iconName;
        $this->subRoutes = Collection::wrap($subRoutes); 
    }
}