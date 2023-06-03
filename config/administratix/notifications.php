<?php


return [
    'default-notification' => \Administratix\Administratix\Notifications\AdminNotification::class,
    'mail-notification' => \Administratix\Administratix\Mail\AdminMail::class,
    'icon-component' => 'admin::icon.awesome',
    'via' => [
        'database'
    ],
    'types' => [
        'info' => [
            'icon-class' => 'text-white bg-info',
            'background-class' => '',
            'icon' => 'info',
        ],
        'neutral' => [
            'icon-class' => '',
            'background-class' => '',
            'icon' => '',
        ],
        'success' => [
            'icon-class' => 'text-white bg-success',
            'background-class' => '',
            'icon' => 'check',
        ],
        'warning' => [
            'icon-class' => 'text-white bg-warning',
            'background-class' => '',
            'icon' => 'exclamation',
        ],
        'error' => [
            'icon-class' => 'text-white bg-error',
            'background-class' => '',
            'icon' => 'xmark',
        ]
    ]
];