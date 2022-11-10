<?php

namespace Administratix\Administratix\Support\Livewire\Components\Form;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;

trait WithInputWidgetDates
{
    /**
     * The inputWidgetDate elements
     * 
     * @var array
     */
    // public array $inputWidgetDates;


    /**
     * The mount method
     * 
     * @return void
     */
    public function mountWithInputWidgetDates()
    {
        if(!isset($this->inputWidgetDates))
            throw new PropertyIsNotDefined('$inputWidgetDates');
    }


    /**
     * Toggle the inputWidgetDate
     * 
     * @param  string $name
     * @return void
     */
    public function toggleInputWidgetDate($name)
    {
        if(array_key_exists($name, $this->inputWidgetDates))
            return $this->inputWidgetDates[$name] = ! $this->inputWidgetDates[$name];
        
        $this->alerts[$name] = true; 
    }

    /**
     * Show the inputWidgetDate
     * 
     * @param  string $name
     * @return void
     */
    public function showInputWidgetDate($name)
    {
        $this->inputWidgetDates[$name] = true;
    }

    /**
     * Hide the inputWidgetDate
     * 
     * @param  string $name
     * @return void
     */
    public function hideInputWidgetDate($name)
    {
       $this->inputWidgetDates[$name] = false; 
    }

    /**
     * check the inputWidgetDate status
     * 
     * @param string $name
     * @return bool
     */
    public function getInputWidgetDate($name)
    {
        return array_key_exists($name, $this->inputWidgetDates) ? 
                $this->inputWidgetDates[$name] :
                false;
    }

    /**
     * Check if inputWidgetDate is open
     * 
     * @param  string $name
     * @return bool
     */
    public function isInputWidgetDateOpen($name)
    {
        return $this->getInputWidgetDate($name);
    }

    /**
     * Check if inputWidgetDate closed
     * 
     * @param  string $name
     * @return bool
     */
    public function isInputWidgetDateClosed($name)
    {
        return ! $this->getInputWidgetDate($name);
    }
}