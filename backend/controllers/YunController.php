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
        $page = \Yii::$app->request->get('page');
        $page = $page-1+12;
        $data = ['code'=>0,'msg'=>'','count'=>100,'data'=>[
            ['id'=>1+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>2+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>3+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>4+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>5+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>6+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>7+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>8+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>9+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>10+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>11+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>11+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123],
            ['id'=>12+$page,'username'=>rand(1,9999),'email'=>333,'sex'=>444,'city'=>555,'sign'=>666,'experience'=>77,'ip'=>888,'logins'=>999,'joinTime'=>123]
        ]];
//    var_dump(json_encode($data));die;
                return json_encode($data);
//        return $this->render('jsondata');
    }

    public function actionMain(){
        return $this->render('main');
    }
}