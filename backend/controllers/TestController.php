<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/16
 * Time: 上午10:27
 */

namespace backend\controllers;


class TestController extends BaseController
{
    public function actionIndex(){
        return $this->render('index');
    }
}