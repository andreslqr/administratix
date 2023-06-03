<?php

namespace Administratix\Administratix\Http\Livewire;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use Illuminate\Support\Str;

class Toaster extends Component
{
    /**
     * The toaster instances
     * 
     * @var array
     */
    public $toasts = [];

    /**
     * The available positions
     * 
     * @param array
     */
    public array $positions;

    /**
     * The available types
     * 
     * @param array
     */
    public array $types;

    /**
     * Get the global listeners
     * 
     * @return array
     */
    protected function getListeners()
    {
        return [
            config('administratix.livewire.components.admin.toaster.events.toast') => 'addToast'
        ];
    }

    /**
     * The mount method
     * 
     * @return void
     */
    public function mount()
    {
        $this->positions = config('administratix.livewire.components.admin.toaster.config.positions');
        $this->types = config('administratix.livewire.components.admin.toaster.config.types');
        $this->setToastsInstances();
    }

    /**
     * Set the toasts instances array
     * 
     * @return void
     */
    protected function setToastsInstances()
    {
        foreach($this->positions as $position => $class)
            $this->toasts[$position] = array();
    }


    /**
     * The render method
     * 
     * @return \Illuminate\View\Factory
     */
    public function render()
    {
        return View::make(config('administratix.livewire.components.admin.toaster.view'));
    }

    /**
     * The toast toaster
     * 
     * @param  string $content
     * @param  string $type
     * @param  string $position
     * @param  int $duration
     * @param  string $iconName
     * @param  string $iconComponent
     */
    public function addToast($content, $type, $position, int $duration, $iconName, $iconComponent)
    {
        throw_unless(Arr::has($this->positions, $position), PropertyIsNotDefined::class, "positions.{$position}");
        throw_unless(Arr::has($this->types, $type), PropertyIsNotDefined::class, "types.{$position}");

        $this->toasts[$position][Str::ulid()->toBase32()] = [
            'content' => $content,
            'class' => Arr::get($this->positions, $position),
            'type' => Arr::get($this->types, "{$type}.class"),
            'duration' => $duration,
            'icon' =>  Blade::render('
                <x-dynamic-component :component="$component" :name="$name">
                </x-dynamic-compnent>
            ', [
                'component' => $iconComponent ?: config('administratix.livewire.components.admin.toaster.config.icon-component'),
                'name' => $iconName ?: Arr::get($this->types, "{$type}.icon")
            ])
            
        ];
    }
}