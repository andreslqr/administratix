<?php

return [
    'component'     => 'admin::profile-notifications',
    'class'         => \Administratix\Administratix\Http\Livewire\ProfileOverview::class,
    'view'          => 'admin::livewire.footer',
    'config'        => [
        'default-notifications-count' => 5
    ]
];