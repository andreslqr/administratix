<?php

namespace Administratix\Administratix\Http\Livewire;

use Illuminate\Support\Facades\View;
use Livewire\Component;

class Footer extends Component
{
    /**
     * The render method
     * 
     * @return \Illuminate\View\Factory
     */
    public function render()
    {
        return View::make(config('administratix.livewire.components.footer'));
    }
}