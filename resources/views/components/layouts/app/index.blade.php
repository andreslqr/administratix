<!DOCTYPE html>
<html lang="{{  str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ config('administratix.general.theme') }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        @vite('resources/admin/sass/app.scss') 
        @livewireStyles

        @yield('styles')
        @stack('styles')
    </head>
    <body tabindex="-1">
        
        <div class="bg-base-100 drawer drawer-mobile" x-data="{showSidebar: false}"> 
            <input id="sidebar-menu" type="checkbox" class="drawer-toggle" x-model="showSidebar" />  
            <div class="drawer-content flex flex-col">  
                @livewire(config('administratix.livewire.components.admin.navbar.component'))
                <main class="{{ config('administratix.general.app-padding') }}"> 
                    {{ $slot }}
                </main>
                @livewire(config('administratix.livewire.components.admin.footer.component'))
            </div>
            
            @livewire(config('administratix.livewire.components.admin.sidebar.component'))
        </div>
        
        @livewireScripts
        @yield('scripts')
        @stack('scripts')
        @vite('resources/admin/js/app.js')
    </body>
</html>