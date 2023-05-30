<?php

namespace Administratix\Administratix\Http\Livewire;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Illuminate\Support\Str;

class Notifier extends Component
{
    /**
     * The notifier instances
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
     * The mount method
     * 
     * @return void
     */
    public function mount()
    {
        $this->positions = config('administratix.livewire.components.admin.notifier.config.positions');
        $this->types = config('administratix.livewire.components.admin.notifier.config.types');
        $this->setToastsInstances();
        foreach($this->positions as $position => $vx)
        {
            // foreach($this->types as $type => $v)
                $this->addToast("<h1> test</h1>", 'error', $position, 10000);
        }
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
        return View::make(config('administratix.livewire.components.admin.notifier.view'));
    }

    protected function addToast($content, $type = 'info', $position = 'top-end', int $duration = 1000, $iconName = null, $iconComponent = null)
    {
        throw_unless(Arr::has($this->positions, $position), PropertyIsNotDefined::class, "positions.{$position}");
        throw_unless(Arr::has($this->types, $type), PropertyIsNotDefined::class, "types.{$position}");

        $this->toasts[$position][(string) Str::ulid()] = [
            'content' => $content,
            'class' => Arr::get($this->positions, $position),
            'type' => Arr::get($this->types, "{$type}.class"),
            'duration' => $duration,
            'icon' =>  Blade::render('
                <x-dynamic-component :component="$component" :name="$name">
                </x-dynamic-compnent>
            ', [
                'component' => $iconComponent ?: config('administratix.livewire.components.admin.notifier.config.icon-component'),
                'name' => $iconName ?: Arr::get($this->types, "{$type}.icon")
            ])
            
        ];
    }
}