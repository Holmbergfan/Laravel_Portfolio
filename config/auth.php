<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'admins', // Eller 'users', om du vill
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'admins',  // Pekar nedan på 'providers' => ['admins']
        ],
    ],

    'providers' => [
        // Viktigt: "admins" måste finnas, eftersom 'guard' => 'admins' ovan
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class, // Pekar på Admin-modellen
        ],
    ],

    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets', // Standard. Om du vill använda password resets
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
