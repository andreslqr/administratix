<?php

return [
    'component'     => 'admin::notifier',
    'class'         => \Administratix\Administratix\Http\Livewire\Notifier::class,
    'view'          => 'admin::livewire.notifier',
    'config'        => [
        'icon-component' => 'admin::icon.awesome',
        'positions' => [
            'top-start'     => 'toast-top toast-start',
            'top-center'    => 'toast-top toast-center',
            'top-end'       => 'toast-top toast-end',
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