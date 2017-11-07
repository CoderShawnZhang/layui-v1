<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/7
 * Time: 下午5:24
 */
namespace api\Modules\v1\Models;

Class User extends \yii\db\ActiveRecord{

    const USER_STATUS_0 = 0; // 正常
    const USER_STATUS_1 = 1; // 停用
    const USER_STATUS_2 = 2; // 锁定

    const USER_TYPE_1 = 1; // 安乐窝总部
    const USER_TYPE_2 = 2; // 加盟商
    const USER_TYPE_3 = 3; // 供应商

    const LOCK_TIME = 3600; //锁定一小时

    public static function tableName()
    {
        return "{{%user}}";
    }
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::USER_STATUS_0],
            ['status', 'in', 'range' => [self::USER_STATUS_0, self::USER_STATUS_1]],
        ];
    }
}