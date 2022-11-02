<div x-data="{
        showMenu: @entangle('showMenu'), 
        showSmallMenu: @entangle('showSmallMenu')
    }"
    x-on:sidebar-show-small-menu.window="showSmallMenu = !showSmallMenu"
    x-on:sidebar-show-menu.window="showMenu = !showMenu"
>
    <aside class="sidebar w-256 overflow-scroll fixed h-screen top-0 left-0 bg-background-secondary drop-shadow-xl hidden lg:block">
        <div class="h-56 mb-5">
        </div>
        @foreach($this->items as $item)

        @endforeach
    </aside>

    <aside class="sidebar w-256 overflow-scroll fixed h-screen top-0 left-0 bg-background-secondary drop-shadow-xl z-50" x-bind:class="showMenu ? 'block' : 'hidden'" x-on:click.outside="showMenu ? showMenu = false : ''" >
        <div class="h-56 mb-5">
        </div>
        @foreach($this->items as $item)

        @endforeach
    </aside>
</div>