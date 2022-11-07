<?php

namespace Administratix\Administratix\Support\Livewire\Components;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;

trait WithModals
{
    /**
     * The modal elements
     * 
     * @var array
     */
    // public array $modals;


    /**
     * The mount method
     * 
     * @return void
     */
    public function mountWithModals()
    {
        if(!isset($this->modals))
            throw new PropertyIsNotDefined('$modals');
    }


    /**
     * Toggle the modal
     * 
     * @param  string $name
     * @return void
     */
    public function toggleModal($name)
    {
        if(array_key_exists($name, $this->modals))
            return $this->modals[$name] = ! $this->modals[$name];
        
        $this->alerts[$name] = true; 
    }

    /**
     * Show the modal
     * 
     * @param  string $name
     * @return void
     */
    public function showModal($name)
    {
        $this->modals[$name] = true;
    }

    /**
     * Hide the modal
     * 
     * @param  string $name
     * @return void
     */
    public function hideModal($name)
    {
       $this->modals[$name] = false; 
    }

    /**
     * check the modal status
     * 
     * @param string $name
     * @return bool
     */
    public function getModal($name)
    {
        return array_key_exists($name, $this->modals) ? 
                $this->modals[$name] :
                false;
    }

    /**
     * Check if modal is open
     * 
     * @param  string $name
     * @return bool
     */
    public function isModalOpen($name)
    {
        return $this->getModal($name);
    }

    /**
     * Check if modal closed
     * 
     * @param  string $name
     * @return bool
     */
    public function isModalClosed($name)
    {
        return ! $this->getModal($name);
    }
}