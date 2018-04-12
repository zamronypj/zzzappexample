<?php
// Create and configure Slim app
return [
    'settings' => [
        'addContentLengthHeader' => false,

        'app' => [
            'cache' => [
                'storage' => 'file',

                'file' => [
                    'dir' => 'storages/cache/',
                    'prefix' => 'cache',
                ],

                'redis' => [
                    'host'   => '127.0.0.1',
                    'port'   => 6379,
                    'prefix' => 'zzz',
                ],
            ],
        ],
    ],
];
