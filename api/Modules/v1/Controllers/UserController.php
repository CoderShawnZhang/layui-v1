<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/9
 * Time: 上午9:13
 */
namespace api\Modules\v1\Controllers;

use api\Controllers\BaseController;

class UserController extends BaseController
{
    public $modelClass = 'api\Modules\v1\Models\User';

    public function actionIndex(){
        return 232222;
    }
}