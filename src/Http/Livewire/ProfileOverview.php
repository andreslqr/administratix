<?php

namespace Administratix\Administratix\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class ProfileOverview extends Component
{

    /**
     * The current guard of the admin
     * 
     * @var string
     */
    public $guard;

    /**
     * The mount method
     * @param  string $guard
     * @return void
     */
    public function mount($guard)
    {
        $this->guard = $guard;
    }

    /**
     * The user instance
     * 
     * @return \Illuminate\Foundation\Auth\User
     */
    public function getUserProperty()
    {
        return User::first();
        return Auth::guard($this->guard)->user();
    }

    /**
     * The icon default
     * 
     * @return string
     */
    public function getIconComponentProperty()
    {
        return config('administratix.livewire.components.admin.profile-overview.config.icon-component');
    }

    /**
     * The icon default
     * 
     * @return string
     */
    public function getUserIconNameProperty()
    {
        return config('administratix.livewire.components.admin.profile-overview.config.user-icon');
    }

    /**
     * The render method
     * 
     * @return \Illuminate\View\Factory
     */
    public function render()
    {
        return View::make(config('administratix.livewire.components.admin.profile-overview.view'));
    }

    /**
     * Logout from current session
     * 
     * @return void
     */
    public function logout()
    {
        return Auth::guard($this->guard)->logout();
    }
}