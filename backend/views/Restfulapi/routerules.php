<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>搭建RESTful API 结构及代码</legend>
</fieldset>
<div class="layui-collapse" lay-filter="test">
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">RESTful API 目录结构</h2>
        <div class="layui-colla-content">
<pre class="layui-code" lay-title="RESTful API 目录结构">
api-----
    Config---
        .gitignore
        bootstrap.php
        main.php
        main-local.php
        params.php
        params-local.php
    Controllers----
        BaseController.php
    Modules---
        Filters---
            APIAuth.php
        v1---
            Controllers---
                UserController.php
            Models---
                User.php
            Module.php
        v2---
            Controllers---
                OrdersController.php
            Models---
                Orders.php
            Module.php
    runtime---
    web---
</pre>
</div>
    </div>

    <div class="layui-colla-item">
        <h2 class="layui-colla-title">./api/Controllers/BaseController</h2>
        <div class="layui-colla-content">
<pre class="layui-code" lay-title="BaseController.php" lay-skin="notepad">
/**
 *
 * RESTful API控制器继承的 是 ActiveController 。
 */
namespace api\Controllers;

use api\Modules\Filters\APIAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\RateLimiter;
use yii\rest\ActiveController;
use yii\filters\auth\HttpBasicAuth;
use Yii;
class BaseController extends ActiveController {

    public function init()
    {
        parent::init();
        // 因为RESTful APIs应为无状态的， 当yii\web\User::enableSession为false，
        // 请求中的用户认证状态就不能通过session来保持。
        //        Yii::$app->user->enableSession = false;
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
    //直接在响应主体内包含分页信息
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}
</pre>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">./api/Modules/Filters/APIAuth.php</h2>
        <div class="layui-colla-content">
<pre class="layui-code" lay-title="APIAuth.php" lay-skin="notepad">
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/9
 * Time: 上午9:34
 */
namespace api\Modules\Filters;

use yii\filters\auth\QueryParamAuth;

class APIAuth extends QueryParamAuth
{
    /**
     * @var string the parameter name for passing the access token
     */
    public $tokenParam = 'access-token';


    /**
     * @inheritdoc
     */
    public function authenticate($user, $request, $response)
    {
        //        $accessToken = $request->get($this->tokenParam);
        $accessToken = $request->getHeaders()->get($this->tokenParam);
        if (is_string($accessToken)) {
            $identity = $user->loginByAccessToken($accessToken, get_class($this));
            if ($identity !== null) {
                return $identity;
            }
        }
        if ($accessToken !== null) {
            $this->handleFailure($response);
        }

        return null;
    }
}
</pre>
        </div>
    </div>

    <div class="layui-colla-item">
        <h2 class="layui-colla-title">./api/Modules/v1/Controllers/UserController.php</h2>
        <div class="layui-colla-content">
<pre class="layui-code" lay-title="APIAuth.php" lay-skin="notepad">
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/9
 * Time: 上午9:13
 */
namespace api\Modules\v1\Controllers;

use api\Controllers\BaseController;

class UserController extends BaseController
{
    public $modelClass = 'api\Modules\v1\Models\User';

    public function actionIndex(){
        return 232222;
    }
}
</pre>
        </div>
    </div>

    <div class="layui-colla-item">
        <h2 class="layui-colla-title">./api/Modules/v1/Models/User.php</h2>
        <div class="layui-colla-content">
<pre class="layui-code" lay-title="APIAuth.php" lay-skin="notepad">
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/9
 * Time: 上午9:13
 */
namespace api\Modules\v1\Models;


use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\IdentityInterface;
use yii\web\Linkable;
use yii\web\Link;

class User extends ActiveRecord implements IdentityInterface,Linkable
{
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [
            [['status', 'type', 'role', 'created', 'modified', 'isDel', 'refId', 'group'], 'integer'],
            [['name', 'creater', 'modifier'], 'string', 'max' => 24],
            [['password', 'remark', 'avatar'], 'string', 'max' => 255],
            ['belong', 'string', 'max' => 36],
            [['mobile'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 128],

            [['email'], 'email'],
            [['name', 'mobile', 'email'], 'trim'],

            ['password', 'required', 'message' => '', 'on' => ['login']],
            ['verifyCode', 'required', 'message' => '验证码不能为空', 'on' => 'login'],
            ['verifyCode', 'captcha', 'captchaAction' => '/User/user/captcha', 'message' => '验证码不正确', 'on' => 'login'],
            ['rememberMe', 'boolean'],
            ['email', 'email', 'on' => ['info']],
            ['password', 'validatePassword', 'on' => ['login', 'info']],
            [['password2', 'password3'], 'string', 'min' => 6, 'message' => '密码长度必须大于6位'],
            ['password3', 'compare', 'compareAttribute' => 'password2', 'message' => '新密码不匹配', 'on' => 'info'],

            [['name', 'mobile'], 'required', 'message' => '{attribute}不能为空', 'on' => ['register', 'update']],

            [['mobile', 'name', 'email'], 'filter', 'filter' => 'trim', 'on' => ['register', 'update']],
            [['email'], 'email', 'on' => ['register', 'update']],

            ['email', 'required', 'message' => '{attribute}不能为空', 'on' => ['register', 'update']],
            ['type', 'required', 'message' => '用户类型不为空', 'on' => ['register', 'update']],
            ['mobile', 'match', 'pattern' => '/^(1[34578][0-9]{9})$/', 'message' => '{attribute}格式错误，请重新输入'],

            ['searchConfig', 'default', 'value' => ''],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '用户Id',
            'name' => '用户名',
            'password' => '用户密码',
            'password2' => '新密码',
            'password3' => '确认密码',
            'mobile' => '用户手机',
            'email' => '用户邮箱',
            'status' => '用户状态 0 正常 1 停用 2 锁定',
            'type' => '用户类型 1 客服 2 加盟商 3 供应商',
            'remark' => '用户备注',
            'avatar' => '用户头像',
            'role' => '用户角色',
            'creater' => '创建人',
            'created' => '创建时间',
            'modifier' => '修改人',
            'modified' => '修改时间',
            'isDel' => '软删除 0 未删除 1 删除',
            'refId' => '外键链接',
            'lockTime' => '用户锁定时间',
            'verifyCode' => '',
            'group' => '加盟商导购组',
        ];
    }



    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token, 'status' => 0]);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => 0]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public static function findByUsername($username)
    {
        return static::find()->Where(['mobile' => $username])->one();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['user', 'id' => $this->id], true),
        ];
    }
</pre>
        </div>
    </div>

    <div class="layui-colla-item">
        <h2 class="layui-colla-title">./api/Modules/v1/Module.php</h2>
        <div class="layui-colla-content">
<pre class="layui-code" lay-title="APIAuth.php" lay-skin="notepad">
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
</pre>
        </div>
    </div>

    <div class="layui-colla-item">
        <h2 class="layui-colla-title">./api/Modules/v2/Controllers/OrderController.php</h2>
        <div class="layui-colla-content">
<pre class="layui-code" lay-title="APIAuth.php" lay-skin="notepad">
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/9
 * Time: 上午11:56
 */
namespace api\Modules\v2\Controllers;

class OrderControllers extends \api\Controllers\BaseController
{
    public $modelClass = 'api\Modules\v2\Models\Orders';
    public function actionIndex(){

    }
}
</pre>
        </div>
    </div>

    <div class="layui-colla-item">
        <h2 class="layui-colla-title">./api/Modules/v2/Models/Orders.php</h2>
        <div class="layui-colla-content">
<pre class="layui-code" lay-title="APIAuth.php" lay-skin="notepad">
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/9
 * Time: 上午11:56
 */
namespace api\Modules\v2\Models;

class Orders extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%orders}}';
    }

    public function rules()
    {
        return [];
    }

    public function attributeLabels()
    {
        return [];
    }
}
</pre>
        </div>
    </div>

    <div class="layui-colla-item">
        <h2 class="layui-colla-title">./api/Modules/v2/Module.php</h2>
        <div class="layui-colla-content">
<pre class="layui-code" lay-title="APIAuth.php" lay-skin="notepad">
/**
 *
 */


class Module extends \yii\base\Module{
    public $controllerNamespace = 'api\Modules\v2\Controllers';
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }
}
</pre>
        </div>
    </div>

    <div class="layui-colla-item">
        <h2 class="layui-colla-title">./api/runtime</h2>
        <div class="layui-colla-content">
<pre class="layui-code" lay-title="APIAuth.php" lay-skin="notepad">

    复制backend内容。
</pre>
        </div>
    </div>

    <div class="layui-colla-item">
        <h2 class="layui-colla-title">./api/web</h2>
        <div class="layui-colla-content">
<pre class="layui-code" lay-title="APIAuth.php" lay-skin="notepad">

 复制backend内容。
</pre>
        </div>
    </div>

</div>

<script>
    layui.use('code', function(){
       layui.code();  //实际使用时，执行该方法即可。而此处注释是因为修饰器在别的js中已经执行过了
    });
</script>