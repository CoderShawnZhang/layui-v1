<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
//            'class' => 'yii\redis\Cache',  //redis接管缓存
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '192.168.200.101',
            'port' => 6379,
            'database' => 0,
            'password' => 'anlewo2016',
        ],
    ],
];
