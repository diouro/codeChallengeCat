<?php

return [
    'settings' => [
        'addContentLengthHeader' => false,
        'displayErrorDetails' => true,

        'db' => [
            'driver'    => 'mysql',
            'host'      => '192.168.1.6',
            'database'  => 'catapult',
            'username'  => 'root',
            'password'  => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/templates',
        ]
    ],
    
    'jwt' => [
        'secreat' => 'cow6rI57auNl8oLmw4QZFrit1TdlehK5mL8GnRkzKBg'
    ]
];