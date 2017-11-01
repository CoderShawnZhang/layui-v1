<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/31
 * Time: 下午2:15
 */

namespace backend\controllers;

use yii\base\Controller;

class IndexController extends Controller
{
    public function actionIndex(){

        return $this->render('index');
    }

    public function actionDesktop(){
        $this->layout = false;//不载入模版
        return $this->render('desktop');
    }
}