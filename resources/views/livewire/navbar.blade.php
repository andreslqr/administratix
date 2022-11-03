<header class="header fixed h-56 w-screen top-0 left-0 bg-background-secondary drop-shadow flex justify-between">
    <x-dynamic-component :component="config('administratix.views.components.button.view')" round="rounded-full" x-data="" color="background-secondary" class="block lg:hidden text-black" x-on:click="$dispatch('sidebar-show-menu')">
        <x-dynamic-component :component="config('administratix.views.components.icon.awesome.view')" name="bars" />
    </x-dynamic-component>
    <div class="flex">
        <div class="w-auto lg:w-256 h-56 flex justify-center items-center">
            <div class="w-auto lg:w-3/4 h-3/4 lg:h-auto flex items-center">
                <img src="{{ Vite::asset('resources/admin/images/logo/logo.svg') }}">
            </div>
        </div>
        <div class="hidden lg:block">
            <x-dynamic-component :component="config('administratix.views.components.button.view')" round="rounded-full" x-data="" x-on:click="$dispatch('sidebar-show-small-menu')" color="background-secondary" class="text-black">
                <x-dynamic-component :component="config('administratix.views.components.icon.awesome.view')" name="bars" />
            </x-dynamic-component>
        </div>
    </div>
    <x-dynamic-component :component="config('administratix.views.components.button.view')" round="rounded-full" color="background-secondary" class="text-black">
        <x-dynamic-component :component="config('administratix.views.components.icon.awesome.view')" name="user" />
    </x-dynamic-component>
</header>

