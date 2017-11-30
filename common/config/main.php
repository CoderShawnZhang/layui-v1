<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'webshell' => [
            'class' => 'samdark\webshell\Module',
            // 'yiiScript' => Yii::getAlias('@root'). '/yii', // adjust path to point to your ./yii script
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.2'],
            'checkAccessCallback' => function (\yii\base\Action $action) {
                // return true if access is granted or false otherwise
                return true;
            }
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'keyPrefix' => 'layui_'
//            'class' => 'yii\redis\Cache',
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
