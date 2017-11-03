<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/31
 * Time: 下午3:54
 */

namespace backend\controllers;

use yii\base\Controller;
class YunController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionGoods(){
        return $this->render('goods');
    }

    public function actionTable(){
        return $this->render('table');
    }

    public function actionForm(){
        return $this->render('form');
    }

    public function actionJson(){
        $data = ['code'=>0,'msg'=>'','count'=>1,'data'=>[
            ['id'=>1,'username'=>222,'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>2,'username'=>222,'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>3,'username'=>222,'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>4,'username'=>222,'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>5,'username'=>222,'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>6,'username'=>222,'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>7,'username'=>222,'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>8,'username'=>222,'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>9,'username'=>222,'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>10,'username'=>222,'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123]
        ]];
//    var_dump(json_encode($data));die;
                return json_encode($data);
//        return $this->render('jsondata');
    }

    public function actionMain(){
        return $this->render('main');
    }
}