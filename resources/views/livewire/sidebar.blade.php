<div class="drawer-side shadow-md" x-data="{showMenu: @entangle('showMenu')}" x-modelable="showMenu" x-model="showSidebar">
    <label for="sidebar-menu" class="drawer-overlay"></label>
    <aside class="bg-base-200 w-80">
        <div class="navbar bg-base-100">
            <a class="btn btn-ghost normal-case text-xl w-full">
                <img src="{{ Vite::asset('resources/admin/images/logo/logo.svg') }}" alt="{{ __('logo of :app', ['app' => config('app.name')]) }}" class="" />
            </a>
        </div>
        <x-dynamic-component :component="config('administratix.views.components.menu.view')" class="p-2 pl-0">
            @foreach($this->items as $item)
                <x-dynamic-component :component="config('administratix.views.components.menu.item.view')" class="rounded-l-none active:rounded-l-none rounded-r-full" active> 
                    @if($item->getIconName())
                        <x-dynamic-component :component="$item->getIconComponent()" :name="$item->getIconName()" /> 
                    @endif
                    {{ $item->getDisplay() }}
                </x-dynamic-component>
            @endforeach
        </x-dynamic-component>
    </aside>
</div>
