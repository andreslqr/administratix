<?php

return [
    'component'     => 'admin::profile-overview',
    'class'         => \Administratix\Administratix\Http\Livewire\ProfileOverview::class,
    'view'          => 'admin::livewire.profile-overview',
    'events'        => [
        
    ],
    'config'        => [
        'icon-component' => 'admin::icon.awesome',
        'user-icon' => 'user'
    ]
];