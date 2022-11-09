<?php

namespace Administratix\Administratix\Support\Livewire\Components;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;

trait WithTabs
{
    /**
     * The tab elements
     * 
     * @var array
     */
    // public array $tabs;


    /**
     * The mount method
     * 
     * @return void
     */
    public function mountWithTabs()
    {
        if(!isset($this->tabs))
            throw new PropertyIsNotDefined('$tabs');
    }


    /**
     * Show the tab
     * 
     * @param  string $name
     * @param  string $tab
     * @return void
     */
    public function showTab($name, $tab)
    {
        $this->tabs[$name] = $tab;
    }

    /**
     * check the tab status
     * 
     * @param string $name
     * @return bool
     */
    public function getTab($name)
    {
        return array_key_exists($name, $this->tabs) ? 
                $this->tabs[$name] :
                false;
    }

    /**
     * Check if tab is open
     * 
     * @param  string $name
     * @param  string $tab
     * @return bool
     */
    public function isTabOpen($name, $tab)
    {
        return $this->getTab($name) == $tab;
    }

    /**
     * Check if tab closed
     * 
     * @param  string $name
     * @param  string $tab
     * @return bool
     */
    public function isTabClosed($name, $tab)
    {
        return ! $this->getTab($name) == $tab;
    }
}