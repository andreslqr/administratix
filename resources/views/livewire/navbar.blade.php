<header class="sticky top-0 shadow-md">
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <button class="btn btn-ghost btn-circle block lg:hidden" x-on:click="showSidebar = !showSidebar">
                <x-dynamic-component :component="config('administratix.views.components.icon.awesome.view')" name="bars" />
            </button>
        </div>
        <div class="navbar-center inline-flex lg:hidden">
            <a class="btn btn-ghost normal-case text-xl">
                <img src="{{ Vite::asset('resources/admin/images/logo/logo.svg') }}" alt="{{ __('logo of :app', ['app' => config('app.name')]) }}" class="hidden sm:block" />
                <img src="{{ Vite::asset('resources/admin/images/logo/logo-mini.svg') }}" alt="{{ __('logo of :app', ['app' => config('app.name')]) }}" class="block sm:hidden" />
            </a>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-circle">
                <x-dynamic-component :component="config('administratix.views.components.icon.awesome.view')" name="bell" />
            </button>
            <button class="btn btn-ghost btn-circle">
                <x-dynamic-component :component="config('administratix.views.components.icon.awesome.view')" name="user" />
            <div class="indicator">
            </div>
            </button>
        </div>
    </div>
</header>

