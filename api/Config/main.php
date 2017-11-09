<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\Controllers',
    'bootstrap' => ['v1','log'],
    'modules' => [
        'v1'=>[
            'class' => 'api\Modules\v1\Module',
            'basePath' => '@app/Modules/v1',
        ]
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
        ],
        'user' => [
            'identityClass' => 'api\Modules\v1\Models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => null,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
//                ['class' => 'yii\rest\UrlRule', 'controller' => 'user'],
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
//                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//                'GET,POST,HEAD <module:\w+>/<controller>/<action>' => '<module>/<controller>/<action>',
//                'GET,POST,HEAD <module:\w+>/<controller:\w+>/<action>/<id:\d+>' => '<module>/<controller>/<action>',
                // 'PUT,PATCH <controller:\w+>/<id>' => '<controller>/update',
                // 'DELETE <controller:\w+>/<id>' => '<controller>/delete',
                // 'POST users' => '<controller>/create',
                // 'GET,HEAD users' => '<controller>/index',
                // ['class' => 'yii\rest\UrlRule', 'controller' => ['v1/site', 'v1/login']],
                // ['class' => 'yii\rest\UrlRule', 'controller' => ['v2/site', 'v2/login']],
                ['class' => 'yii\rest\UrlRule', 'controller' => ['v2/user']],
            ],
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '192.168.200.101',
            'port' => 6379,
            'database' => 0,
            'password' => 'anlewo2016',
        ],

    ],
    'params' => $params,
];
