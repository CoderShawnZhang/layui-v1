<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/11/2
 * Time: 上午11:37
 */

namespace backend\controllers;

use backend\YiiFramework2\Security\Authentication\Authentication;
use Yii;
class AuthenticationController extends BaseController
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionLogin(){
        $postData = Yii::$app->request->post();
        $validate = $this->validateRequestData($postData);

        if($validate['success']){
            $Auth = Authentication::Login($postData);
            if($Auth){
                return $this->render('authsuccess');
            }else{
                return $this->render('authfail',['errorMsg' => $validate]);
            }
        }else{
            return $this->render('authfail',['errorMsg' => $validate]);
        }
    }

    public function actionGetIdentity(){
        $userArr = [];
        $identity = Yii::$app->user->identity;
        foreach($identity as $k=>$v){
            $userArr[$k] = $v;
        }
        $AuthData = [
            'code'=>0,
            'msg'=>'',
            'count'=>count(identity),
            'data'=>[
                $userArr
            ]
        ];
        return json_encode($AuthData,true);
    }
    /**
     * 验证－－认证数据
     * @param $post
     */
    private function validateRequestData($post){
        $username = isset($post['username']) ? $post['username'] : '';
        $password = isset($post['password']) ? $post['password'] : '';
        if(empty($password)){
            return ['success' => false,'msg' => '密码不能为空！'];
        }
        if(empty($username)){
            return ['success' => false,'msg' => '认证名不能为空'];
        }

        return ['success' => true,'msg'=>''];
    }
}