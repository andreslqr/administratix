<?php

namespace Administratix\Administratix\Support\Livewire\Components;

use Illuminate\Support\Arr;

/**
 * @method void emitTo(mixed $name, $event, ...params)
 */
trait WithToasts
{
    /**
     * The toast toaster
     * 
     * @param  string $content
     * @param  string $type
     * @param  string $position
     * @param  int $duration
     * @param  string $iconName
     * @param  string $iconComponent
     * @return void
     */
    protected function createToast($content, $type = null, $position = null, int $duration = null, $iconName = null, $iconComponent = null)
    {
        $position = $position ?: Arr::first(array_keys(config('administratix.livewire.components.admin.toaster.config.positions')));
        $duration = $duration ?: config('administratix.livewire.components.admin.toaster.config.default-duration');
        $iconComponent = $iconComponent ?: config('administratix.livewire.components.admin.toaster.config.icon-component');

        return $this->emitTo(
            config('administratix.livewire.components.admin.toaster.component'),
            config('administratix.general.livewire.events.toaster.toast'),
            $content,
            $type,
            $position,
            $duration,
            $iconName,
            $iconComponent    
        );
    }

    /**
     * Toast with normal
     * 
     * @param  string $content
     * @param  string $duration
     * @param  string $iconName
     * @param  string $iconComponent
     * @return void
     */
    public function toast($content, $position = null, $duration = null, $iconName = null, $iconComponent = null)
    {
        return $this->createToast(
            $content,
            'neutral',
            $position,
            $duration,
            $iconName,
            $iconComponent
        );
    }

    /**
     * Toast with info
     * 
     * @param  string $content
     * @param  string $duration
     * @param  string $iconName
     * @param  string $iconComponent
     * @return void
     */
    public function infoToast($content, $position = null, $duration = null, $iconName = null, $iconComponent = null)
    {
        return $this->createToast(
            $content,
            'info',
            $position,
            $duration,
            $iconName,
            $iconComponent
        );
    }

    /**
     * Toast with success
     * 
     * @param  string $content
     * @param  string $duration
     * @param  string $iconName
     * @param  string $iconComponent
     * @return void
     */
    public function successToast($content, $position = null, $duration = null, $iconName = null, $iconComponent = null)
    {
        return $this->createToast(
            $content,
            'success',
            $position,
            $duration,
            $iconName,
            $iconComponent
        );
    }

    /**
     * Toast with warning
     * 
     * @param  string $content
     * @param  string $duration
     * @param  string $iconName
     * @param  string $iconComponent
     * @return void
     */
    public function warningToast($content, $position = null, $duration = null, $iconName = null, $iconComponent = null)
    {
        return $this->createToast(
            $content,
            'warning',
            $position,
            $duration,
            $iconName,
            $iconComponent
        );
    }

     /**
     * Toast with error
     * 
     * @param  string $content
     * @param  string $duration
     * @param  string $iconName
     * @param  string $iconComponent
     * @return void
     */
    public function errorToast($content, $position = null, $duration = null, $iconName = null, $iconComponent = null)
    {
        return $this->createToast(
            $content,
            'error',
            $position,
            $duration,
            $iconName,
            $iconComponent
        );
    }

}
