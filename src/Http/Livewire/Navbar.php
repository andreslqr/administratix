<?php

namespace Administratix\Administratix\Http\Livewire;

use Administratix\Administratix\Support\Livewire\Components\WithDropdowns;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use App\Models\User;

class Navbar extends Component
{
    use WithDropdowns;

    /**
     * The dropdown elements
     * 
     * @var array
     */
    public array $dropdowns = [
        'notifications' => false,
        'profile-overview' => false,
        'profilePreview' => false
    ];

    /**
     * The current guard of the admin
     * 
     * @var string
     */
    public $guard;

    /**
     * The mount method livewire
     * 
     * @param  string $guard
     * @return void
     */
    public function mount($guard = null)
    {
        $this->guard = $guard;
    }

    /**
     * The render method
     * 
     * @return \Illuminate\View\Factory
     */
    public function render()
    {
        return View::make(config('administratix.livewire.components.admin.navbar.view'));
    }

    /**
     * Check the user session
     * 
     * @return bool
     */
    public function getIsAuthenticatedProperty()
    {
        return Auth::guard($this->guard)->check();
    }

    /**
     * The user instance
     * 
     * @return \Illuminate\Foundation\Auth\User
     */
    protected function user()
    {
        return User::first();
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
                    ->unreadNotifications();
    }
}