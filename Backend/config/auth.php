<?php

return [
    'defaults' => [
        'guard' => 'api',
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'database', // หรือ 'eloquent' ถ้าใช้ model
            'table' => 'users',
        ],
    ],
];
