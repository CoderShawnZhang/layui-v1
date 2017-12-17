<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/9
 * Time: 上午9:13
 */
namespace api\Modules\v1\Controllers;

use api\Controllers\BaseController;
use api\Modules\v1\Models\User;

class UserController extends BaseController
{
    public $modelClass = 'api\Modules\v1\Models\User';

    public function actions(){
        $action = parent::actions();
        unset($action['index']);
        return $action;
    }

    public function actionIndex(){
//        return \backend\models\User::find()->where(['id'=>47])->one();
        $u = User::find()->where(['id'=>47])->one();
        return array_merge($u->toArray(),['aaavv'=>3333]);
    }
}