<?php
/**
 * 接受用户数据
 */

namespace backend\controllers;


use backend\models\GetingData\LoginForm;
use backend\models\UserModel;

class GetingdataController extends BaseController
{
    public function actionIndex(){
//        var_dump(123);die;
        $LoginForm = new LoginForm();
        return $this->render('index',['model'=>$LoginForm]);
    }

    public function actionPostform(){
        $post = \Yii::$app->request->post();
        unset($post['_csrf']);
        $loginform = new LoginForm();
        $reflector = new \ReflectionClass($loginform);
        $formArr = $reflector->getShortName();
        $arr[$formArr] = [];
        foreach ($post as $k=>$v){
            if($k=='_csrf'){
                continue;
            }
            $arr[$formArr][$k] = $v;
        }
        //注意，如果自己重组了模型生成表单的name值，load的时候是有问题的，因为它会以数组方式数组是以模型名定义的。然后load这个模型数组
        if(!$loginform->load($arr))
        {
            var_dump($loginform->getErrors());die;
        }

        if(!$loginform->validate()){
            var_dump($loginform->getErrors());
        }
        var_dump(222);die;
    }
}