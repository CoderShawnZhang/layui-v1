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
        $identity = User::findOne(['name' => $loginData['mobile'],'password'=>$loginData['password'],'status' => 0]);
        //处理密码
        if(empty($identity)){
            return false;
        }
     return true;
        if(Yii::$app->getSecurity()->validatePassword($loginData['password'],$identity['auth_key'])){
            Yii::$app->user->login($identity);
            return true;
        }else{
            return false;
        }
    }
}