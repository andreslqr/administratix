<header class="sticky top-0 shadow-md bg-base-100 z-10 backdrop-blur bg-opacity-70">
    <div class="navbar">
        <div class="navbar-start">
            <x-dynamic-component :component="config('administratix.views.components.button.view')" ghost circle class="lg:hidden shadow" x-on:click="showSidebar = !showSidebar">
                <x-dynamic-component :component="config('administratix.views.components.icon.awesome.view')" name="bars" />
            </x-dynamic-component>
        </div>
        <div class="navbar-center inline-flex lg:hidden">
            <a class="btn btn-ghost normal-case text-xl">
                <img src="{{ Vite::asset('resources/admin/images/logo/logo.svg') }}" alt="{{ __('logo of :app', ['app' => config('app.name')]) }}" class="hidden sm:block" />
                <img src="{{ Vite::asset('resources/admin/images/logo/logo-mini.svg') }}" alt="{{ __('logo of :app', ['app' => config('app.name')]) }}" class="block sm:hidden" />
            </a>
        </div>
        <div class="navbar-end gap-x-2">
            {{-- @if($this->isAuthenticated) --}}
                <x-dynamic-component :component="config('administratix.views.components.dropdown.view')" class="dropdown-end" wire:dropdown="notifications">
                    <x-slot:trigger>
                        <x-dynamic-component :component="config('administratix.views.components.button.view')" class="shadow" ghost circle>
                            <x-dynamic-component :component="config('administratix.views.components.icon.awesome.view')" name="bell" />
                        </x-dynamic-component>
                    </x-slot:trigger>
                    <x-slot:content class="w-96">
                        @livewire(config('administratix.livewire.components.admin.notifications.component'), ['guard' => $guard]) 
                    </x-slot:content>
                </x-dynamic-component>
                <x-dynamic-component :component="config('administratix.views.components.button.view')" class="hidden lg:block shadow" ghost circle>
                    <x-dynamic-component :component="config('administratix.views.components.icon.awesome.view')" name="user" />
                </x-dynamic-component>
            {{-- @endif --}}
        </div>
    </div>
</header>

