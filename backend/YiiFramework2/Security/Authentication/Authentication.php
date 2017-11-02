<?php

/**
 * 认证类
 */
namespace backend\YiiFramework2\Security\Authentication;
use backend\models\User;
use backend\models\UserTable;
use Yii;

class Authentication
{
    public static function Login($loginData){
        $identity = User::findOne(['username' => $loginData['username'],'password'=>$loginData['password'],'state' => UserTable::USER_STATE_NOMAL]);
        if(!empty($identity)){
            Yii::$app->user->login($identity);
            return true;
        }else{
            return false;
        }
    }
}