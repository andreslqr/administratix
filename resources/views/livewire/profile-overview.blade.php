<div class="shadow bg-base-100 rounded-box w-full backdrop-blur-sm bg-opacity-90">
    <div class="py-4 px-3 flex items-center justify-center gap-x-1" wire:key="navbar-notifications-title">
        <div class="btn btn-outline btn-xs btn-circle">
            <x-dynamic-component :component="$this->iconComponent" :name="$this->userIconName">
            </x-dynamic-component>
        </div>
        <div>
            <h3>
                {{ __('Hello, :name', ['name' => $this->user->name]) }}
            </h3>
        </div>

    </div>
    <div class="max-h-64 overflow-y-auto overscroll-contain divide-y divide-base-300">
        @stack('profile-options')
        <div class="py-4 px-3 flex items-center justify-center gap-x-1">
            <div>
                <div class="text-xs cursor-pointer link link-primary link-hover" wire:click="logout">
                    {{ __('Logout') }}
                </div>
            </div>
        </div>
    </div>
</div>
