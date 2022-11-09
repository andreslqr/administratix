<?php

namespace Administratix\Administratix\Support\Livewire\Components;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;
use Illuminate\Support\Arr;

trait WithSteppers
{
    /**
     * The stepper elements
     * 
     * @var array
     */
    // public array $steppers;

    /**
     * The stepper instance
     * 
     * @var array
     */
    // public array $step = array();
    /**
     * The mount method
     * 
     * @return void
     */
    public function mountWithSteppers()
    {
        if(!isset($this->steppers))
            throw new PropertyIsNotDefined('$steppers');

        if(!isset($this->step))
            throw new PropertyIsNotDefined('$step');

    }

    /**
     * check the stepper status
     * 
     * @param string $name
     * @return bool
     */
    public function getStep($name)
    {
        return Arr::get($this->step, $name, false);
    }

    /**
     * Set the step
     * 
     * @param  string $name
     * @param  string $step
     * @return void
     */
    public function setStep($name, $step)
    {
        $this->step[$name] = $step;
    }

    /**
     * Next step
     * 
     * @param  string $name
     */
    public function nextStep($name)
    {
        $steps = Arr::get($this->steppers, $name, []);

        $returnValue = false;
        foreach($steps as $step)
        {
            if($returnValue)
                return $this->step[$name] = $step;
            
            if($step == Arr::get($this->step, $name))
                $returnValue = true;
        }
    }

    /**
     * Prev step
     * 
     * @param  string $name
     * @return void
     */
    public function prevStep($name)
    {
        $steps = Arr::get($this->steppers, $name, []);

        $prevValue = null;
        
        foreach($steps as $step)
        {
            if($step === Arr::get($this->step, $name, false) && ! is_null($prevValue))
                $this->step[$name] = $prevValue;

            $prevValue = $step;
        }
    }

    /**
     * check if is in step
     * 
     * @param string $name
     * @param string $step
     */
    public function isInStep($name, $step)
    {

    }

    /**
     * Check if stepper closed
     * 
     * @param  string $name
     * @return bool
     */
    public function stepWasPassed($name, $step)
    {
        
    }
}