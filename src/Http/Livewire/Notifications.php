<?php

namespace Administratix\Administratix\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Arr;
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
     * set the notifications read
     * 
     * @var bool
     */
    public $allNotifications;

    /**
     * The mount method
     * @param  string $guard
     * @return void
     */
    public function mount($guard)
    {
        $this->guard = $guard;
        $this->count = config('administratix.livewire.components.admin.notifications.config.default-notifications-count');
        $this->allNotifications = false;  
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
                    ->notifications()
                    ->when(!$this->allNotifications, fn(Builder $query) => $query->whereNull('read_at'))
                    ->select(config('administratix.livewire.components.admin.notifications.config.select'))
                    ->limit($this->count);
    }

    /**
     * Up the notifications
     * 
     * @return void
     */
    public function loadMoreNotifcations()
    {
        $this->count += 3;
    }

    /**
     * The icon default
     * 
     * @return string
     */
    public function getIconComponentProperty()
    {
        return config('administratix.livewire.components.admin.notifications.config.icon-component');
    }

    /**
     * The icon default
     * 
     * @return string
     */
    public function getSwapComponentProperty()
    {
        return config('administratix.livewire.components.admin.notifications.config.swap-component');
    }


    /**
     * The icon default
     * 
     * @return string
     */
    public function getNoneReadIconNameProperty()
    {
        return config('administratix.livewire.components.admin.notifications.config.none-read-icon');
    }

    /**
     * The icon default
     * 
     * @return string
     */
    public function getAllIconNameProperty()
    {
        return config('administratix.livewire.components.admin.notifications.config.all-icon');
    }

    /**
     * The icon default
     * 
     * @return string
     */
    public function getEmptyIconNameProperty()
    {
        return config('administratix.livewire.components.admin.notifications.config.empty-icon');
    }

    /**
     * The notifications types
     * 
     * @return array
     */
    public function getNotificationTypesProperty()
    {
        return config('administratix.notifications.types');
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

    /**
     * Read the notification
     * 
     * @param \Illuminate
     * @return void
     */
    public function readNotification(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        if(Arr::get($notification->data, 'action'))
            return redirect(Arr::get($notification->data, 'action'));
    }
}