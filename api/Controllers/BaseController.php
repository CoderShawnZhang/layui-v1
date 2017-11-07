<?php

namespace api\Controllers;

use yii\filters\auth\QueryParamAuth;
use yii\filters\RateLimiter;
use yii\rest\Controller;
use yii\filters\auth\HttpBasicAuth;
use Yii;
class BaseController extends Controller{

    public function init()
    {
        parent::init();
        // 因为RESTful APIs应为无状态的， 当yii\web\User::enableSession为false，
        // 请求中的用户认证状态就不能通过session来保持。
        Yii::$app->user->enableSession = false;
    }

    public function behaviors()
    {
        //behaviors()这个函数的是定义这个控制器类的行为，
        //也就是每一次访问这个控制器的方法，
        //都会执行这个behaviors中定义的各种行为，
        //认证也是这个流程，
        //我们访问一个api接口时，
        //就会执行yii\filters\auth\QueryParamAuth的这个文件的authenticate()这个方法
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            //QueryParamAuth 认证需要在URL里带入access-token请求认证：layuiapi.local.anlewo.com:80/v1/user?access-token=ddf061559c21b91e2e516f32c7863493
//            'class' => QueryParamAuth::className(),
            'class' => HttpBearerAuth::className(),
            'tokenParam' => 'token',
//            'class' => QueryParamAuth::className(),
        ];

        //访问速率
        $behaviorsp['rateLimiter'] = [
            'class' => RateLimiter::className(),
            'enableRateLimitHeaders' => true,
        ];
        return $behaviors;
    }
    //直接在响应主体内包含分页信息
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}