<?php

namespace Administratix\Administratix\Support\Livewire\Components;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;

trait WithAlerts
{
    /**
     * The  elements
     * 
     * @var array
     */
    // public array $alerts;


    /**
     * The mount method
     * 
     * @return void
     */
    public function mountWithAlerts()
    {
        if(!isset($this->alerts))
            throw new PropertyIsNotDefined('$alerts');
    }


    /**
     * Toggle the alert
     * 
     * @param  string $name
     * @return void
     */
    public function toggleAlert($name)
    {
        if(array_key_exists($name, $this->alerts))
            return $this->alerts[$name] = ! $this->alerts[$name];
        
        $this->alerts[$name] = true;
    }

    /**
     * Show the alert
     * 
     * @param  string $name
     * @return void
     */
    public function showAlert($name)
    {
        $this->alerts[$name] = true;
    }

    /**
     * Hide the alert
     * 
     * @param  string $name
     * @return void
     */
    public function hideAlert($name)
    {
       $this->alerts[$name] = false; 
    }

    /**
     * check the alert status
     * 
     * @param string $name
     * @return bool
     */
    public function getAlert($name)
    {
        return isset($this->alerts[$name]) ? 
                $this->alerts[$name] :
                false;
    }

    /**
     * Check if alert is open
     * 
     * @param  string $name
     * @return bool
     */
    public function isAlertOpen($name)
    {
        return $this->getAlert($name);
    }

    /**
     * Check if alert closed
     * 
     * @param  string $name
     * @return bool
     */
    public function isAlertClosed($name)
    {
        return ! $this->getAlert($name);
    }
}