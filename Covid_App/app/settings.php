<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use MongoLog\Logger;

return function (ContainerBuilder $containerBuilder){
    $containerBuilder->addDefinitions([

    'settings' => [
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => false,

        'doctrine' => [
            // if true, metadata caching is forcefully disabled
            'dev_mode' => true,

            // path where the compiled metadata info will be cached
            // make sure the path exists and it is writable
            'cache_dir' => APP_ROOT . '/var/doctrine',

            // you should add any other path containing annotated entity classes
            'metadata_dirs' => [APP_ROOT . '/src/Domain'],

            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'port' => 3306,
                'dbname' => 'projetcovid',
                'user' => 'root',
                'password' => '',
                'charset' => 'utf8'
            ]
        ],
    ],
    ]
    );

};