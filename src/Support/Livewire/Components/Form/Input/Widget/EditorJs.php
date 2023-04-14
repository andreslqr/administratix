<?php

namespace Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;

use Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;

class EditorJs extends Widget
{
     /**
     * The array options for js with values
     * 
     * @var array
     */
    protected array $jsOptions = [
        
    ];

     /**
     * The array options for js
     * 
     * @var array
     */
    protected array $jsAvailableOptions = [
        'holderId',
        'data',
        'autofocus',
        'placeholder',
        'logLevel',
        'i18n',
        'readOnly',
        'inlineToolBar',
        'tunes'
    ];

     /**
     * The available methods for js instance
     * 
     * @var array
     */
    protected array $jsAvailableMethods = [
        'toggle',
        'render',
        'save'
    ];

    /**
     * The available events for js instance
     * 
     * @var array
     */
    protected array $jsAvailableEvents = [
        'onReady',
    ];

    /**
     * The save method
     * 
     * @return void
     */
    public function save()
    {

    }
}