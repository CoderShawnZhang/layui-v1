<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/11/9
 * Time: 下午10:00
 */

namespace backend\controllers;


use yii\base\Controller;

class Error extends Controller
{
    public function actionNoPermission(){
        return $this->render('no_permission');
    }
}