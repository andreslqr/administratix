<?php

return [
    'component'     => 'admin::notifier',
    'class'         => \Administratix\Administratix\Http\Livewire\Notifier::class,
    'view'          => 'admin::livewire.notifier',
    'config'        => [
        'icon-component' => 'admin::icon.awesome',
        'positions' => [
            'top-start' => '',
            'top-center' => '',
            'top-end' => '',
            'middle-end' => '',
            'bottom-end' => '',
            'bottom-center' => '',
            'bottom-start' => '',
            'middle-start' => '',
            'middle-center' => ''
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
                'icon' => 'circle¡-exclamation',
            ],
            'error' => [
                'class' => 'alert-error',
                'icon' => 'circle-xmark',
            ]
        ]
    ]
];