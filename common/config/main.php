<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'pgsql:host=pgsql;port=5432;dbname=pdb',
            'username' => 'pu',
            'password' => 'pp',
            'charset' => 'utf8',
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],
];
