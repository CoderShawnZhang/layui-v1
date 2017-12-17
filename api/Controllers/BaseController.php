<?php
/**
 *
 * RESTful API控制器继承的 是 ActiveController 。
 */
namespace api\Controllers;

use api\Modules\Filters\APIAuth;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\RateLimiter;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use Yii;
use yii\web\Response;

class BaseController extends ActiveController {

    public function init()
    {
        parent::init();
        // 因为RESTful APIs应为无状态的， 当yii\web\User::enableSession为false，
        // 请求中的用户认证状态就不能通过session来保持。
//        Yii::$app->user->enableSession = false;
    }

    /**
     * behaviors
     * @return array 前置行为
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authenticator' => [
                //这个地方使用`ComopositeAuth` 混合认证
                'class' => CompositeAuth::className(),
                // 除外action
                'except' => ['login'],
                //`authMethods` 中的每一个元素都应该是 一种 认证方式的类或者一个 配置数组
                'authMethods' => [
                    /*下面是三种验证access-token方式*/
                    //1.HTTP 基本认证: access-token 当作用户名发送，应用在access-token可安全存在API使用端的场景，例如，API使用端是运行在一台服务器上的程序。
                    // HttpBasicAuth::className(),
                    //2.OAuth 2: 使用者从认证服务器上获取基于OAuth2协议的access-token，然后通过 HTTP Bearer Tokens 发送到API 服务器。
                    HttpBearerAuth::className(),// OAuth2认证方式
                    //3.请求参数: access-token 当作API URL请求参数发送，这种方式应主要用于JSONP请求，因为它不能使用HTTP头来发送access-token
                    //http://localhost/user/index/index?access-token=123
                    QueryParamAuth::className(),//get参数带access-token
                    APIAuth::className(),  //header参数带access-token
//                    'tokenParam'=>'token',
                ],
            ],
            [
                'class' => 'yii\filters\ContentNegotiator',
                // 'only' => ['view', 'index'],
                // in a controller
                // if in a module, use the following IDs for user actions
                // 'only' => ['user/view', 'user/index']
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
                'languages' => [
                    'en',
                ],
            ],
        ]);
    }
    /*
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
//            'class' => HttpBearerAuth::className(),
              'class' => APIAuth::className(),
            'tokenParam' => 'token',
        ];

        //访问速率
        $behaviorsp['rateLimiter'] = [
            'class' => RateLimiter::className(),
            'enableRateLimitHeaders' => true,
        ];
        return $behaviors;
    }
    */
    //直接在响应主体内包含分页信息
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}