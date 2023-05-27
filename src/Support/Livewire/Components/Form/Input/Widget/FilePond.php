<?php

namespace Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;

use Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;
use Illuminate\Foundation\Vite;

/**
 *
 */
class FilePond extends Widget
{

    /**
     * The name of the component widget
     * 
     * @var string
     */
    protected $widgetName = 'filepond';

    /**
     * The array options for js with values
     * 
     * @var array
     */
    protected array $jsOptions = [
        'allowMultiple' => false
    ];

    /**
     * The array options for js
     * 
     * @var array
     */
    protected array $jsAvailableOptions = [
        'element',
        'status',
        'name',
        'className',
        'required',
        'disabled',
        'captureMethod',
        'files',
        'allowDrop',
        'allowBrowse',
        'allowPaste',
        'allowMultiple',
        'allowReplace',
        'allowRevert',
        'allowRemove',
        'allowProcess',
        'allowReorder',
        'storeAsFile',
        'forceRevert',
        'maxFiles',
        'maxParallelUploads',
        'checkValidity',
        'itemInsertLocation',
        'itenInsertInterval',
        'credits',
        'server',
        'labels',
        'svg icons',
        'callbacks',
        'hooks',
        'styles',
        'files'
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