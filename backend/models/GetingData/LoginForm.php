<?php

/**
 * 接受用户数据--登录表单模型
 */

namespace backend\models\GetingData;
use yii\db\ActiveRecord;

class LoginForm extends ActiveRecord
{
    public $name;
    public $password;
    public $mobile;
    public $email;
    public $searchConfig;

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [
            ['name','string'],
            ['password','string'],
            [['name','password'],'required','message'=>'必填项'],
            ['mobile','string'],
            ['email','string'],
            ['searchConfig','string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => '用户名',
            'password' => '密码',
            'mobile' => '手机号',
            'email' => '邮件',
            'searchConfig' => '配置',
        ];
    }
}