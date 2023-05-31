<?php

namespace Administratix\Administratix\Http\Livewire;

use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;
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
        return View::make(config('administratix.livewire.components.admin.footer.view'));
    }

    /**
     * Get the message for footer
     * 
     * @return string
     */
    public function getMessageProperty()
    {
        return new HtmlString(__(config('administratix.livewire.components.admin.footer.config.message')));
    }
}