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
    public bool $showSidebar;

    /**
     * The version mini of the sidebar
     * 
     * @var bool
     */
    public bool $showSmallMenu;

    /**
     * The items added dynamically
     * 
     * @var \Illuminate\Support\Collection
     */
    public Collection $menuItems;

    /**
     * The mount method
     * 
     * @return void
     */
    public function mount()
    {
        $this->showSidebar = false;
        $this->showSmallMenu = false;
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
            RouteManager::getRoutes(config('administratix.general.default-route-type'))
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
}