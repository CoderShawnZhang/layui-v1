<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2017/12/4
 * Time: 下午7:20
 */

namespace backend\controllers;


class StructureController extends BaseController
{
    public function actionModels(){
        return $this->render('models');
    }
}