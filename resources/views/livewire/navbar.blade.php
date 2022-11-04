<header class="sticky top-0 shadow-md">
    <div class="navbar bg-base-100">
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
            <x-dynamic-component :component="config('administratix.views.components.button.view')" class="shadow" ghost circle>
                <x-dynamic-component :component="config('administratix.views.components.icon.awesome.view')" name="bell" />
            </x-dynamic-component>
            <x-dynamic-component :component="config('administratix.views.components.button.view')" class="hidden lg:block shadow" ghost circle>
                <x-dynamic-component :component="config('administratix.views.components.icon.awesome.view')" name="user" />
            </x-dynamic-component>
        </div>
    </div>
</header>

