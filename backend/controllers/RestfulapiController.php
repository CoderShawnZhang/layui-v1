<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/8
 * Time: 下午5:42
 */

namespace backend\controllers;


class RestfulapiController extends BaseController
{
    public function actionQuickStart(){
        return $this->render('quickstart');
    }

    public function actionResources(){
        return $this->render('resources');
    }
}