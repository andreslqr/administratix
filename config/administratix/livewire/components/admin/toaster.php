<?php

return [
    'component'     => 'admin::toaster',
    'class'         => \Administratix\Administratix\Http\Livewire\Toaster::class,
    'view'          => 'admin::livewire.toaster',
    'events'        => [
        'toast' => 'toast'
    ],
    'config'        => [
        'defer' => true,
        'icon-component' => 'admin::icon.awesome',
        'default-duration' => 5000,
        'positions' => [
            'top-end'       => 'toast-top toast-end',
            'top-start'     => 'toast-top toast-start',
            'top-center'    => 'toast-top toast-center',
            'middle-end'    => 'toast-middle toast-end',
            'bottom-end'    => 'toast-bottom toast-end',
            'bottom-center' => 'toast-bottom toast-center',
            'bottom-start'  => 'toast-bottom toast-start',
            'middle-start'  => 'toast-middle toast-start',
            'middle-center' => 'toast-middle toast-center'
        ],
        'types' => [
            'neutral' => [
                'class' => '',
                'icon' => '',
            ],
            'info' => [
                'class' => 'alert-info',
                'icon' => 'circle-info',
            ],
            'success' => [
                'class' => 'alert-success',
                'icon' => 'circle-check',
            ],
            'warning' => [
                'class' => 'alert-warning',
                'icon' => 'circle-exclamation',
            ],
            'error' => [
                'class' => 'alert-error',
                'icon' => 'circle-xmark',
            ]
        ]
    ]
];