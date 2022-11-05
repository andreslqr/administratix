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
        isset($this->modals[$name]);
            return $this->modals[$name] = true;

        $this->modals[$name] = !$this->modals[$name];
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
        return isset($this->modals[$name]) ? 
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