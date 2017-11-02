<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/11/2
 * Time: 下午8:58
 */

namespace backend\controllers;


use yii\filters\AccessControl;

class AuthorizationController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login','logout','signup','special-callback'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login','signup'],
                        'roles' => ['?'],//？访客用户
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],//@已认证用户
                    ],
                    [
                        'allow' => true,
                        'actions' => ['special-callback'],
                        'matchCallback' => function ($rule, $action) {
//            var_dump(date('d-m'));die;
                            return date('d-m') === '02-11';
                        }
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    throw new \Exception('只能在11月2号才可以访问！');
                }
            ],
        ];
    }
    public function actionSpecialCallback(){
        return $this->render('access');
    }
    public function actionRbac(){
        return $this->render('rbac');
    }
}