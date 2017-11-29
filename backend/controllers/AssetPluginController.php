<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/29
 * Time: 上午9:48
 */

namespace backend\controllers;


class AssetPluginController extends BaseController
{
    public function actionIntroduce(){
        return $this->render('introduce');
    }
}