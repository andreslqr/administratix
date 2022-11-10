<?php

namespace Administratix\Administratix\Support\Livewire\Components\Form;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;

trait WithInputWidgetDatetimes
{
    /**
     * The inputWidgetDatetime elements
     * 
     * @var array
     */
    // public array $inputWidgetDatetimes;


    /**
     * The mount method
     * 
     * @return void
     */
    public function mountWithInputWidgetDatetimes()
    {
        if(!isset($this->inputWidgetDatetimes))
            throw new PropertyIsNotDefined('$inputWidgetDatetimes');
    }


    /**
     * Toggle the inputWidgetDatetime
     * 
     * @param  string $name
     * @return void
     */
    public function toggleInputWidgetDatetime($name)
    {
        if(array_key_exists($name, $this->inputWidgetDatetimes))
            return $this->inputWidgetDatetimes[$name] = ! $this->inputWidgetDatetimes[$name];
        
        $this->alerts[$name] = true; 
    }

    /**
     * Show the inputWidgetDatetime
     * 
     * @param  string $name
     * @return void
     */
    public function showInputWidgetDatetime($name)
    {
        $this->inputWidgetDatetimes[$name] = true;
    }

    /**
     * Hide the inputWidgetDatetime
     * 
     * @param  string $name
     * @return void
     */
    public function hideInputWidgetDatetime($name)
    {
       $this->inputWidgetDatetimes[$name] = false; 
    }

    /**
     * check the inputWidgetDatetime status
     * 
     * @param string $name
     * @return bool
     */
    public function getInputWidgetDatetime($name)
    {
        return array_key_exists($name, $this->inputWidgetDatetimes) ? 
                $this->inputWidgetDatetimes[$name] :
                false;
    }

    /**
     * Check if inputWidgetDatetime is open
     * 
     * @param  string $name
     * @return bool
     */
    public function isInputWidgetDatetimeOpen($name)
    {
        return $this->getInputWidgetDatetime($name);
    }

    /**
     * Check if inputWidgetDatetime closed
     * 
     * @param  string $name
     * @return bool
     */
    public function isInputWidgetDatetimeClosed($name)
    {
        return ! $this->getInputWidgetDatetime($name);
    }
}