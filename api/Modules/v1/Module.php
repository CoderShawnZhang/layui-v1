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
        $app->getUrlManager()->addRules([
            [
                'class' => 'yii\rest\UrlRule',
                'controller' => ['v1/user'],
                'extraPatterns' => [

                ]
            ],
            [
                'class' => 'yii\rest\UrlRule',
                'controller' => ['v1/order'],
                'extraPatterns' => [

                ]
            ],
        ]);
    }
}