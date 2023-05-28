<?php


return [
    'default-route-type' => env('ADMINISTRATIX_DEFAULT_ROUTER', 'admin'),

    'theme' => 'admin',

    'app-padding' => 'p-2',

    'livewire' => [
        'events' => [
            'sidebar' => [
                'toggle-menu' => 'toggle-sidebar-menu',
                'show-menu' => 'show-sidebar-menu',
                'hide-menu' => 'hide-sidebar-menu'
            ]
        ]
    ]
];