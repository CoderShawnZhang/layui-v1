<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/7
 * Time: 下午4:12
 */
namespace api\Modules\v1\Controllers;
use api\Controllers\BaseController;

use api\Modules\v1\Models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\Controller;
use Yii;

class UserController extends BaseController
{
    public $modelClass = 'api\Modules\v1\Models\User';

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function actions()
    {
        $actions = parent::actions();
//        unset($actions['index'],$actions['view'],$actions['create']);
        return $actions;
    }

    public function actionIndex(){
        $list = User::find()->where(['id'=>1])->all();
        return $list;
    }
}