<?php

/**
 * 设置用户组件－－认证
 */
namespace backend\models;

use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements IdentityInterface
{
    public $password_hash;
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * 根据指定的用户ID查找仁恒模型类的实例，当你需要使用session来维持登录状态的时候会用到这个方法
     *
     * 根据给到的ID查询身份。
     *
     * @param string|integer $id 被查询的ID
     * @return IdentityInterface|null 通过ID匹配到的身份对象
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * 根据指定的存取令牌查找认证模型类的实例，该方法用户通过单个加密令牌认证用户的时候（比如无状态的RESTful应用）
     *
     * 根据 token 查询身份。
     *
     * @param string $token 被查询的 token
     * @return IdentityInterface|null 通过 token 得到的身份对象
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * 获取该认证实例表示的用户ID
     * @return int|string 当前用户ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 获取基于cookie登录是使用的认证密钥。认证密钥存储在cookie里并且将来会与服务端的版本进行比较以确保cookie的有效性。
     * @return string 当前用户的（cookie）认证密钥
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * 是基于cookie登录密钥的验证的逻辑实现
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}