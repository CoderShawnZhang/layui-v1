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
        var_dump($post);die;
    }
}