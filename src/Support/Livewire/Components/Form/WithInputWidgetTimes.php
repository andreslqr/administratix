<?php

namespace Administratix\Administratix\Support\Livewire\Components\Form;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;

trait WithInputWidgetTimes
{
    /**
     * The inputWidgetDate elements
     * 
     * @var array
     */
    // public array $inputWidgetTimes;


    /**
     * The mount method
     * 
     * @return void
     */
    public function mountWithInputWidgetTimes()
    {
        if(!isset($this->inputWidgetTimes))
            throw new PropertyIsNotDefined('$inputWidgetTimes');
    }


    /**
     * Toggle the inputWidgetDate
     * 
     * @param  string $name
     * @return void
     */
    public function toggleInputWidgetDate($name)
    {
        if(array_key_exists($name, $this->inputWidgetTimes))
            return $this->inputWidgetTimes[$name] = ! $this->inputWidgetTimes[$name];
        
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
        $this->inputWidgetTimes[$name] = true;
    }

    /**
     * Hide the inputWidgetDate
     * 
     * @param  string $name
     * @return void
     */
    public function hideInputWidgetDate($name)
    {
       $this->inputWidgetTimes[$name] = false; 
    }

    /**
     * check the inputWidgetDate status
     * 
     * @param string $name
     * @return bool
     */
    public function getInputWidgetDate($name)
    {
        return array_key_exists($name, $this->inputWidgetTimes) ? 
                $this->inputWidgetTimes[$name] :
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