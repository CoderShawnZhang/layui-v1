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
}