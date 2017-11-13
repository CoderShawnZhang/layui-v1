<?php
/**
 * 接受用户数据
 */

namespace backend\controllers;


use backend\models\GetingData\LoginForm;

class GetingdataController extends BaseController
{
    public function actionIndex(){
//        var_dump(123);die;
        $LoginForm = new LoginForm();
        return $this->render('index',['model'=>$LoginForm]);
    }

    public function actionPostform(){
        $post = \Yii::$app->request->post();
//        unset($post['_csrf']);

        $loginform = new LoginForm();

        if(!$loginform->load($post))
        {
            var_dump($loginform->getErrors());die;
        }

        if($loginform->validate()){
            var_dump('ok');
        }else{
            var_dump($loginform->getErrors());
        }
    }
}