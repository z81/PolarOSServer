<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                /*'polaros' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=polaros',
                    'user'       => 'root',
                    'password'   => '',
                    'attributes' => []
                ],*/
                'polaros' => [
                    'adapter'    => 'sqlite',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'sqlite:./polaros.db',
                    'user'       => 'root',
                    'password'   => '',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'polaros',
            'connections' => ['polaros']
        ],
        'generator' => [
            'defaultConnection' => 'polaros',
            'connections' => ['polaros']
        ]
    ]
];