<div x-data="{
        showMenu: @entangle('showMenu'), 
        showSmallMenu: @entangle('showSmallMenu')
    }"
    x-on:sidebar-show-small-menu.window="showSmallMenu = !showSmallMenu"
    x-on:sidebar-show-menu.window="showMenu = !showMenu"
    x-init="$watch('showMenu', value => value ? document.querySelector('body').classList.add('overflow-hidden') : document.querySelector('body').classList.remove('overflow-hidden'))"
>
    <aside class="sidebar overflow-scroll fixed h-screen top-0 left-0 bg-background-secondary drop-shadow-xl hidden lg:block" x-bind:class="showSmallMenu ? 'w-64' : 'w-256'" x-on:sidebar-show-small-menu.window="document.querySelector('main').classList.toggle('lg:pl-256'); document.querySelector('main').classList.toggle('lg:pl-64')">
        <div class="h-56 mb-5">
        </div>
        @foreach($this->items as $item)

        @endforeach
    </aside>

    <aside class="sidebar w-256 overflow-scroll fixed h-screen top-0 left-0 bg-background-secondary drop-shadow-xl z-20"
            x-bind:class="showMenu ? 'block' : 'hidden'" 
            x-on:click.outside="showMenu ? showMenu = false : ''"
    >
        <div class="h-56 mb-5">
        </div>
        @foreach($this->items as $item)

        @endforeach
    </aside>
    <div class="bg-overlay overflow-hidden" x-show="showMenu" :class="{ 'fixed inset-0 z-10 left-0 top-0': showMenu }">
    </div>
</div>