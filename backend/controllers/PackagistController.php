<?php
/**
 * 依赖包管理
 */

namespace backend\controllers;

use UrlScanner\Url\Scanner;
class PackagistController extends BaseController
{
    public function actionIndex(){

        return $this->render('index');
    }

    public function actionCreate(){
        return $this->render('create');
    }

    public function actionInclude(){
        return $this->render('include');
    }

    public function actionMathGitHub(){
        return $this->render('mathgithub');
    }
}