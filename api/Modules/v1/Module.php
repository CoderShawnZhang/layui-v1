<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/7
 * Time: 下午4:12
 */
namespace api\Modules\v1;


use yii\base\BootstrapInterface;

class Module extends \yii\base\Module implements BootstrapInterface
{
    public $controllerNamespace = 'api\Modules\v1\Controllers';

    public function init()
    {
        parent::init();
    }

    /**
     * 路由规则
     *
     * @param \yii\base\Application $app
     */
    public function bootstrap($app)
    {
        $R = 'yii\rest\UrlRule';
        $app->getUrlManager()->addRules([
            [
                'class' => $R,
                'controller' => ['v1/user'],
                'extraPatterns' => [
                    'GET,POST users'=>'users',
                    'GET index'=>'index',
                ]
            ],
            [
                'class' => $R,
                'controller' => ['v1/login']
            ]
        ]);
    }
}