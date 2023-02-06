<?php

namespace Administratix\Administratix\Http\Livewire;

use Administratix\Administratix\Facades\Routing\RouteManager;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class Sidebar extends Component
{
    /** 
     * The show sidebar property
     * 
     * @var bool
    */
    public bool $showMenu;

    /**
     * The router type
     * 
     * @var string
     */
    public $routerType;

    /**
     * The items added dynamically
     * 
     * @var \Illuminate\Support\Collection
     */
    public Collection $menuItems;

    protected function getListeners()
    {
        return [
            config('administratix.general.livewire.events.sidebar.toggle-menu') => 'toggleSidebar',
            config('administratix.general.livewire.events.sidebar.show-menu') => 'toggleSidebar',
            config('administratix.general.livewire.events.sidebar.hide-menu') => 'toggleSidebar',
        ];
    } 

    /**
     * The mount method
     * 
     * @return void
     */
    public function mount($routerType = null)
    {
        $this->routerType = $routerType ?: config('administratix.general.default-route-type');
        $this->showMenu = false;
        $this->menuItems = Collection::make();
    }

    /**
     * The menu items
     * 
     * @return \Illuminate\Support\Collection
     */
    public function getItemsProperty()
    {
        return $this->menuItems->merge(
            RouteManager::getRoutes($this->routerType)
        );
    }

    /**
     * The render method
     * 
     * @return \Illuminate\View\Factory
     */
    public function render()
    {
        return View::make(config('administratix.livewire.components.admin.sidebar.view'));
    }

    /**
     * Toggle the sidebar
     * 
     * @return void
     */
    public function toggleSidebar($value = null)
    {
        if(is_null($value))
            return $this->showMenu = $value;

        $this->showMenu = $value;
    }
}