<?php

namespace Administratix\Administratix\Support\Livewire\GlobalEvents;

trait WithSidebarEvents
{
    /**
     * The method for toggle the menu
     * 
     * @return void
     */
    public function toggleSidebar()
    {
        $this->emit(config('administratix.livewire.components.admin.sidebar.events.toggle-menu'), null);
    }

    /**
     * The method for show the menu
     * 
     * @return void
     */
    public function showSidebar()
    {
        $this->emit(config('administratix.livewire.components.admin.sidebar.events.show-menu'), true);
    }

    /**
     * The method for hide the menu
     * 
     * @return void
     */
    public function hideSidebar()
    {
        $this->emit(config('administratix.livewire.components.admin.sidebar.events.hide-menu'), false);
    }
}