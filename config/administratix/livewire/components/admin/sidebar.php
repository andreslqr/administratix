<?php

return [
    'component'     => 'admin::sidebar',
    'class'         => \Administratix\Administratix\Http\Livewire\Sidebar::class,
    'view'          => 'admin::livewire.sidebar',
    'events'        => [
        'toggle-menu' => 'toggle-sidebar-menu',
        'show-menu' => 'show-sidebar-menu',
        'hide-menu' => 'hide-sidebar-menu'
    ],
    'config'        => [
     
    ],
];