<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/7
 * Time: 下午5:24
 */
namespace api\Modules\v1\Models;



use yii\filters\RateLimitInterface;
use yii\helpers\Url;
use yii\web\IdentityInterface;
use yii\web\Link;
use yii\db\ActiveRecord;

Class User extends ActiveRecord implements IdentityInterface,RateLimitInterface {

    const USER_STATUS_0 = 0; // 正常
    const USER_STATUS_1 = 1; // 停用
    const USER_STATUS_2 = 2; // 锁定

    const USER_TYPE_1 = 1; // 安乐窝总部
    const USER_TYPE_2 = 2; // 加盟商
    const USER_TYPE_3 = 3; // 供应商

    const LOCK_TIME = 3600; //锁定一小时

    public function getRateLimit($request, $action)
    {
      return [3,6];
    }
    public function loadAllowance($request, $action)
    {
        return [$this->allowance,$this->allowance_updated_at];
    }

    public function saveAllowance($request, $action, $allowance, $timestamp)
    {
        $this->allowance = $allowance;
        $this->allowance_updated_at = $timestamp;
        $this->save();
    }



    public static function tableName()
    {
        return "{{%user}}";
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function fields()
    {
        return [
            'id'=>13
        ];
    }
    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['user','id'=>$this->id],true),
        ];
    }
}