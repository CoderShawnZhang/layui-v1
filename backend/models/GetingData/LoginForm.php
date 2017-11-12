<?php

/**
 * 接受用户数据--登录表单模型
 */

namespace backend\models\GetingData;
use yii\db\ActiveRecord;

class LoginForm extends ActiveRecord
{
    public $username;
    public $password;

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码'
        ];
    }
}