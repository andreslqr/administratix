<?php

namespace Administratix\Administratix\Support\Livewire\Components;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;

trait WithCollapses
{
    /**
     * The collapse elements
     * 
     * @var array
     */
    // public array $collapses;


    /**
     * The mount method
     * 
     * @return void
     */
    public function mountWithCollapses()
    {
        if(!isset($this->collapses))
            throw new PropertyIsNotDefined('$collapses');
    }


    /**
     * Toggle the collapse
     * 
     * @param  string $name
     * @return void
     */
    public function toggleCollapse($name)
    {
        if(array_key_exists($name, $this->collapses))
            return $this->collapses[$name] = ! $this->collapses[$name];
        
        $this->collapses[$name] = true;
    }

    /**
     * Show the collapse
     * 
     * @param  string $name
     * @return void
     */
    public function showCollapse($name)
    {
        $this->collapses[$name] = true;
    }

    /**
     * Hide the collapse
     * 
     * @param  string $name
     * @return void
     */
    public function hideCollapse($name)
    {
       $this->collapses[$name] = false; 
    }

    /**
     * check the collapse status
     * 
     * @param string $name
     * @return bool
     */
    public function getCollapse($name)
    {
        return array_key_exists($name, $this->collapses) ? 
                $this->collapses[$name] :
                false;
    }

    /**
     * Check if collapse is open
     * 
     * @param  string $name
     * @return bool
     */
    public function isCollapseOpen($name)
    {
        return $this->getCollapse($name);
    }

    /**
     * Check if collapse closed
     * 
     * @param  string $name
     * @return bool
     */
    public function isCollapseClosed($name)
    {
        return ! $this->getCollapse($name);
    }
}