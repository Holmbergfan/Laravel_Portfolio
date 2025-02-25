<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'admins', // Eller 'users', om du vill
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        // Viktigt: "admins" måste finnas, eftersom 'guard' => 'admins' ovan
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class, // Pekar på Admin-modellen
        ],
    ],

    'passwords' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'password_timeout' => 10800,

];
