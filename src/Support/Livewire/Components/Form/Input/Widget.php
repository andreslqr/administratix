<?php

namespace Administratix\Administratix\Support\Livewire\Components\Form\Input;

use Administratix\Administratix\Exceptions\JsWidgetDoesNotImplementsEvent;
use Administratix\Administratix\Exceptions\JsWidgetDoesNotImplementsMethod;
use Administratix\Administratix\Exceptions\JsWidgetDoesNotImplementsOption;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\Wireable;
use Illuminate\Support\Str;
use TypeError;

abstract class Widget implements Wireable
{
    /**
     * The livewire instance
     * 
     * @var \Livewire\Component
     */
    protected $livewireComponent;

    /**
     * The name of the property
     * 
     * @var string
     */
    protected $wireModelName;

    /**
     * The name of the component widget
     * 
     * @var string
     */
    protected $widgetName;

    /**
     * The array options for js
     * 
     * @var array
     */
    protected array $jsAvailableOptions = [];

    /**
     * The array options for js with values
     * 
     * @var array
     */
    protected array $jsOptions = [];

    /**
     * The available methods for js instance
     * 
     * @var array
     */
    protected array $jsAvailableMethods = [];

    /**
     * The available events for js instance
     * 
     * @var array
     */
    protected array $jsAvailableEvents = [];

    /**
     * The constructor of the class
     * 
     * @param array options
     */
    public function __construct($wireModelName = null, array $options = [])
    {
        $this->wireModelName = $wireModelName;
        foreach($options as $key => $value)
            $this->__set($key, $value);
    } 
    
    /**
     * The method to livewire 
     * 
     * @return mixed
     */
    public function toLivewire()
    {
        return [
            'wireModel' => $this->wireModelName,
            'options' => $this->jsOptions
        ];
    }

    /**
     * The setter for livewire
     * 
     * @param array $value
     */
    public static function fromLivewire($value)
    {
        return self::make(
            Arr::get($value, 'wireModel'),
            Arr::get($value, 'options')
        );        
    }

    /**
     * The instance method
     * 
     * @param array $options
     */
    public static function make($wireModelName = null, array $options = [])
    {
        return new static($wireModelName, $options);
    }

    /**
     * The get property method
     * 
     * @param  string $name
     * @return mixed
     */
    public function __get($name)
    {
        throw_unless(in_array($name, $this->jsAvailableOptions), JsWidgetDoesNotImplementsOption::class, $name);
        
        return Arr::get($this->jsOptions, $name);
    }

    /**
     * The set property method
     * 
     * @param  string $name
     * @param  mixed $value
     * @return void
     */
    public function __set($name, $value)
    {
        throw_unless(in_array($name, $this->jsAvailableOptions), JsWidgetDoesNotImplementsOption::class, $name);

        Arr::set($this->jsOptions, $name, $value);
    }

    /**
     * The call magic method
     * 
     * @param  string $name
     * @param  array $arguments
     * @return void
     */
    public function __call($name, $arguments)
    {
        throw_unless(in_array($name, $this->jsAvailableEvents) || in_array($name, $this->jsAvailableMethods), JsWidgetDoesNotImplementsEvent::class, $name);
        
        if(in_array($name, $this->jsAvailableEvents))
            return $this->getEventName($name);
       
            
        throw_unless(in_array($name, $this->jsAvailableMethods), JsWidgetDoesNotImplementsMethod::class, $name);

        $livewireComponent = $this->pullLivewireComponent($arguments);
        $this->setLivewireComponent($livewireComponent);

        $this->performMethods($name, $arguments);
    }

    /**
     * Pull the livewire component
     * 
     * @param array $arguments
     * @return \Livewire\Component
     */
    protected function pullLivewireComponent(array &$arguments)
    {
        $livewireComponent = Arr::pull($arguments, Arr::first(array_keys($arguments)));

        throw_unless($livewireComponent instanceof Component, TypeError::class, "Argument #1 must be of type Livewire\Component, " . gettype($livewireComponent) . " given");

        return $livewireComponent;
    }

    /**
     * Set the livewire component for instance events
     * 
     * @param \Livewire\Component
     */
    protected function setLivewireComponent($livewireComponent)
    {
        $this->livewireComponent = $livewireComponent;   
    }

    /**
     * Perform events to livewire components js implementation
     * 
     * @param  string $name
     * @param  array $params
     * @return void
     */
    protected function performMethods($name, $params)
    {
        $this->livewireComponent->emitSelf(Str::of($this->widgetName)->kebab()->lower()->finish("-{$this->wireModelName}")->toString(), $name, $params);
    }

    /**
     * Get the event name for the widget
     * 
     * @param  string $name
     * @return string
     */
    protected function getEventName($name)
    {
        return "{$this->wireModelName}-{$name}";
    }
}