<?php

namespace Administratix\Administratix\Support\Livewire\Components;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;

trait WithDropdowns
{
    /**
     * The dropdown elements
     * 
     * @var array
     */
    // public array $dropdowns;


    /**
     * The mount method
     * 
     * @return void
     */
    public function mountWithDropdowns()
    {
        if(!isset($this->dropdowns))
            throw new PropertyIsNotDefined('$dropdowns');
    }


    /**
     * Toggle the dropdown
     * 
     * @param  string $name
     * @return void
     */
    public function toggleDropdown($name)
    {
        isset($this->dropdowns[$name]);
            return $this->dropdowns[$name] = true;

        $this->dropdowns[$name] = !$this->dropdowns[$name];
    }

    /**
     * Show the dropdown
     * 
     * @param  string $name
     * @return void
     */
    public function showDropdown($name)
    {
        $this->dropdowns[$name] = true;
    }

    /**
     * Hide the dropdown
     * 
     * @param  string $name
     * @return void
     */
    public function hideDropdown($name)
    {
       $this->dropdowns[$name] = false; 
    }

    /**
     * check the dropdown status
     * 
     * @param string $name
     * @return bool
     */
    public function getDropdown($name)
    {
        return isset($this->dropdowns[$name]) ? 
                $this->dropdowns[$name] :
                false;
    }

    /**
     * Check if dropdown is open
     * 
     * @param  string $name
     * @return bool
     */
    public function isDrodownOpen($name)
    {
        return $this->getDropdown($name);
    }

    /**
     * Check if dropdown closed
     * 
     * @param  string $name
     * @return bool
     */
    public function isDropdownClosed($name)
    {
        return ! $this->getDropdown($name);
    }
}