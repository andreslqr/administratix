<!DOCTYPE html>
<html lang="{{  str_replace('_', '-', app()->getLocale()) }}" data-theme="admin">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        @vite('resources/admin/sass/app.scss') 
        @livewireStyles

        @yield('styles')
        @stack('styles')
    </head>
    <body>
        @livewire(config('administratix.livewire.components.admin.sidebar.component'))
        @livewire(config('administratix.livewire.components.admin.navbar.component'))

        {{-- <main class="w-full pl-0 lg:pl-256 pt-56 min-h-screen bg-background-general flex flex-col">    
            <div class="main-content flex-auto"> --}}
                {{ $slot }}
            </div>
            
            @livewire(config('administratix.livewire.components.admin.footer.component'))
        </main>
        
        @vite('resources/admin/js/app.js')
        @livewireScripts
        @yield('scripts')
        @stack('scripts')
    </body>
</html>