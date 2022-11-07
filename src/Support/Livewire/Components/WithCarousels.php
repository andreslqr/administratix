<?php

namespace Administratix\Administratix\Support\Livewire\Components;

use Administratix\Administratix\Exceptions\PropertyIsNotDefined;

trait WithCarousels
{
    /**
     * Go to item carousel
     * 
     * @param  string $name 
     * @param  int $index
     * @return void
     */
    public function goToCarouselItem($name, $index)
    {
        $this->emitSelf(config('administratix.views.components.carousel.events.go-to-item') . "-{$name}", $index);
    }
}