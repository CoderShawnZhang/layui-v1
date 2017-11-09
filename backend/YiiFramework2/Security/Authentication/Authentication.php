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
//        $identity = User::findOne(['name' => $loginData['name'],'password'=>$loginData['password'],'status' => UserTable::USER_STATE_NOMAL]);
        $identity = User::findOne(['name' => $loginData['name'],'password'=>$loginData['password'],'status' => 0]);
        if(!empty($identity)){
            Yii::$app->user->login($identity);
            return true;
        }else{
            return false;
        }
    }
}