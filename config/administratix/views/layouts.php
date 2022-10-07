<?php

return [
    'admin' => [
        'auth' =>  'admin::layouts.app',
        'guest' => 'admin::layouts.guest',
        'components' => [
            
            'navbar' => [
                'index' => 'admin::layouts.components.navbar',
                'logo' => 'admin::layouts.components.navbar.logo'
            ],
            'sidebar' => 'admin::layouts.components.sidebar',
            'footer' => 'admin::layouts.components.footer',
        ],
        'livewire' => [
            'navbar' => 'admin::livewire.navbar',
            'sidebar' => 'admin::livewire.sidebar',
            'footer' => 'admin::livewire.footer'
        ]
    ]
];