<?php

namespace Administratix\Administratix\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class Notifications extends Component
{
    /**
     * The current guard of the admin
     * 
     * @var string
     */
    public $guard;

    /**
     * How many notifications display
     * 
     * @var int
     */
    public $count;

    /**
     * 
     */

    /**
     * The mount method
     * @param  string $guard
     * @return void
     */
    public function mount($guard)
    {
        $this->guard = $guard;
        $this->count = config('administratix.livewire.components.admin.notifications.config.default-notifications-count');  
    }

    /**
     * The user instance
     * 
     * @return \Illuminate\Foundation\Auth\User
     */
    protected function user()
    {
        return Auth::guard($this->guard)->user();
    }

    /**
     * The notifications
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getNotificationsProperty()
    {
        return $this->user()
                    ->notifications()
                    ->select(config('administratix.livewire.components.admin.notifications.config.select'))
                    ->limit($this->limit)
                    ->get();
    }

    /**
     * The render method
     * 
     * @return \Illuminate\View\Factory
     */
    public function render()
    {
        return View::make(config('administratix.livewire.components.admin.notifications.view'));
    }
}