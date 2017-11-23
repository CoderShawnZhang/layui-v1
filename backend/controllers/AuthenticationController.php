<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/11/2
 * Time: 上午11:37
 */

namespace backend\controllers;

use app\models\Setting;
use backend\YiiFramework2\Security\Authentication\Authentication;


use Yii;
class AuthenticationController extends BaseController
{
    public function actionIndex(){
        return $this->render('index');
    }

    /**
     * 认证
     * @return string
     */
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

    /**
     * 退出认证
     */
    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->render('authsuccess');
    }
    /**
     * 获取认证数据
     *
     * @return string
     */
    public function actionGetIdentity(){
        $userArr = [];
        $identity = Yii::$app->user->identity;
        if(!empty($identity)){
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
        }else{
            return json_encode($userArr);
        }
    }

    /**
     * 验证－－认证数据
     *
     * @param $post
     * @return array
     */
    private function validateRequestData($post){
        $username = isset($post['mobile']) ? $post['mobile'] : '';
        $password = isset($post['password']) ? $post['password'] : '';
        if(empty($password)){
            return ['success' => false,'msg' => '密码不能为空！'];
        }
        if(empty($username)){
            return ['success' => false,'msg' => '认证名不能为空'];
        }

        return ['success' => true,'msg'=>''];
    }

    /**
     * 客户端验证
     */
    public function actionValidating(){
        $model = new Setting();
        return $this->render('validating',['model' => $model]);
    }
}