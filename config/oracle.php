<?php

return [
    'oracle' => [
        'driver'         => 'oracle',
        'tns'            => env('DB_TNS', '(DESCRIPTION =
        (ADDRESS = (PROTOCOL = TCP)(HOST = 172.18.1.85)(PORT = 1521))
        (CONNECT_DATA =
            (SERVER = DEDICATED)
            (SERVICE_NAME = testdb)
        )
        )'),
        'host'           => env('DB_HOST', '172.18.1.85'),
        'port'           => env('DB_PORT', '1521'),
        'database'       => env('DB_DATABASE', 'testdb'),
        'username'       => env('DB_USERNAME', 'svcibt_2'),
        'password'       => env('DB_PASSWORD', 'SVCIBT_2'),
        'charset'        => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'         => env('DB_PREFIX', ''),
        'prefix_schema'  => env('DB_SCHEMA_PREFIX', ''),
        'edition'        => env('DB_EDITION', 'ora$base'),
        'server_version' => env('DB_SERVER_VERSION', '11g'),
    ],
];
