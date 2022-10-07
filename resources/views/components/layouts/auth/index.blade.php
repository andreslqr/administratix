<!DOCTYPE html>
<html lang="{{  str_replace('_', '-', app()->getLocale()) }}">
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
        <x-dynamic-component :component="config('administratix.views.layouts.admin.components.sidebar')" />
        <x-dynamic-component :component="config('administratix.views.layouts.admin.components.navbar.index')" />
        <main class="w-full pl-256 pt-56 min-h-screen bg-background-general flex flex-col">    
            <div class="main-content flex-auto">
                {{ $slot }}
            </div>
            <x-dynamic-component :component="config('administratix.views.layouts.admin.components.footer')" />
        </main>
        
        @vite('resources/admin/js/app.js')
        @livewireScripts
        @yield('scripts')
        @stack('scripts')
    </body>
</html>