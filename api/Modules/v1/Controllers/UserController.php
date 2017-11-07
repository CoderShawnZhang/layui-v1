<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/7
 * Time: 下午4:12
 */
namespace api\Modules\v1\Controllers;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'api\Modules\v1\Models\User';
    public function actionIndex(){
       return 123;
    }
}