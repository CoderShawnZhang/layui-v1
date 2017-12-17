<?php

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

    /**
     * 字段
     * @return array
     */
    public function fields()
    {
        return array_merge(parent::fields(),[
            'aaa' =>function(){
                return 22222;
            },
            'name' => function(){
                return 234234;
            },
        ]);
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
}