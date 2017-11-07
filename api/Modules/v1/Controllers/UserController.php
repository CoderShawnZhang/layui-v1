<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/7
 * Time: 下午4:12
 */
namespace api\Modules\v1\Controllers;
use api\Controllers\BaseController;

use yii\filters\auth\HttpBasicAuth;
use yii\rest\Controller;
use Yii;

class UserController extends BaseController
{
    public $modelClass = 'api\Modules\v1\Models\User';

    public function actions()
    {
        $actions = parent::actions();
//        unset($actions['index'],$actions['view'],$actions['create']);
        return $actions;
    }

    public function actionIndex(){
       return Yii::$app->user->identity->allowance;
    }
}