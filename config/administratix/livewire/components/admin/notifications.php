<?php

return [
    'component'     => 'admin::notifications',
    'class'         => \Administratix\Administratix\Http\Livewire\Notifications::class,
    'view'          => 'admin::livewire.notifications',
    'events'        => [
        
    ],
    'config'        => [
        'default-notifications-count' => 5,
        'select' => [
            'id',
            'notifiable_type',
            'notifiable_id',
            'data',
            'read_at'
        ],
        'icon-component' => 'admin::icon.awesome',
        'empty-icon' => 'bell-slash',
        'swap-component' => 'admin::form.input.swap',
        'none-read-icon' => 'eye-slash',
        'all-icon' => 'eye',
    ]
];