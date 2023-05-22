<?php

namespace Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;

use Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;
use Illuminate\Foundation\Vite;

/**
 *
 */
class Select2 extends Widget
{
    /**
     * The constructor of the class
     * 
     * @param array options
     */
    public function __construct($wireModelName = null, array $options = [])
    {
        $this->__set('debug', config('app.debug'));
        parent::__construct($wireModelName, $options);
    }

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
        'ajax',
        'allowClear',
        'amdLanguageBase',
        'closeOnSelect',
        'data',
        'dataAdapter',
        'debug',
        'dir',
        'disabled',
        'dropdownAdapter',
        'dropdownAutoWidth',
        'dropdownCssClass',
        'dropdownParent',
        'escapeMarkup',
        'language',
        'matcher',
        'maximumInputLength',
        'maximumSelectionLength',
        'minimumInputLength',
        'minimumResultsForSearch',
        'multiple',
        'placeholder',
        'resultsAdapter',
        'selectionAdapter',
        'selectionCssClass',
        'selectOnClose',
        'sorter',
        'tags',
        'templateResult',
        'templateSelection',
        'theme',
        'tokenizer',
        'tokenSeparators',
        'width',
        'scrollAfterSelect'
    ];

    /**
     * The available methods for js instance
     * 
     * @var array
     */
    protected array $jsAvailableMethods = [

    ];

    /**
     * The available events for js instance
     * 
     * @var array
     */
    protected array $jsAvailableEvents = [
        
    ];
}