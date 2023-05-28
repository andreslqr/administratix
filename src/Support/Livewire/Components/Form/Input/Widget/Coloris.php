<?php

namespace Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;

use Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;

class Coloris extends Widget
{
    /**
     * The name of the component widget
     * 
     * @var string
     */
    protected $widgetName = 'coloris';

     /**
     * The array options for js with values
     * 
     * @var array
     */
    protected array $jsOptions = [
        
    ];

    /**
     * The constructor of the class
     * 
     * @param array options
     */
    public function __construct($wireModelName = null, array $options = [])
    {
        $this->__set('a11y', [
            'open' => 'Open color picker',
            'close' => 'Close color picker',
            'clear' => 'Clear the selected color',
            'marker' => 'Saturation => {s}. Brightness => {v}.',
            'hueSlider' => 'Hue slider',
            'alphaSlider' => 'Opacity slider',
            'input' => 'Color value field',
            'format' => 'Color format',
            'swatch' => 'Color swatch',
            'instruction' => 'Saturation and brightness selector. Use up, down, left and right arrow keys to select.'
        ]);
        parent::__construct($wireModelName, $options);
    }

    /**
     * The array options for js
     * 
     * @var array
     */
    protected array $jsAvailableOptions = [
        'parent',
        'el',
        'wrap',
        'rtl',
        'theme',
        'themeMode',
        'margin',
        'format',
        'formatToggle',
        'alpha',
        'forceAlpha',
        'swatchesOnly',
        'focusInput',
        'selectInput',
        'clearButton',
        'clearLabel',
        'closeButton',
        'closeLabel',
        'swatches',
        'inline',
        'defaultColor',
        'a11y'
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