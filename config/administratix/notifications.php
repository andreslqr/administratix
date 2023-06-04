<?php


return [
    'default-notification' => \Administratix\Administratix\Notifications\AdminNotification::class,
    'mail-notification' => \Administratix\Administratix\Mail\AdminMail::class,
    'via' => [
        'database'
    ],
    'types' => [
        'info' => [
            'icon-class' => 'btn-info',
            'background-class' => 'hover:bg-info/20',
            'icon' => 'info',
        ],
        'neutral' => [
            'icon-class' => '',
            'background-class' => 'hover:bg-base-300/20',
            'icon' => 'bell',
        ],
        'success' => [
            'icon-class' => 'btn-success',
            'background-class' => 'hover:bg-success/20',
            'icon' => 'check',
        ],
        'warning' => [
            'icon-class' => 'btn-warning',
            'background-class' => 'hover:bg-warning/20',
            'icon' => 'exclamation',
        ],
        'error' => [
            'icon-class' => 'btn-error',
            'background-class' => 'hover:bg-error/20',
            'icon' => 'xmark',
        ]
    ]
];