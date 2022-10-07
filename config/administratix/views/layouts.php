<?php

return [
    'admin' => [
        'auth' =>  'admin::layouts.auth',
        'guest' => 'admin::layouts.guest',
        'components' => [
            
            'navbar' => [
                'index' => 'admin::layouts.components.navbar',
                'logo' => 'admin::layouts.components.navbar.logo'
            ],
            'sidebar' => 'admin::layouts.components.sidebar',
            'footer' => 'admin::layouts.components.footer',
        ]
    ]
];