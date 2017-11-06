<?php
/**
 * 菜单管理
 * User: Shawn Zhang
 * Date: 2017/11/3
 * Time: 下午6:01
 */

namespace backend\controllers;


class MenuController extends BaseController
{
    public function actionList(){
        return $this->render('list');
    }
    public function actionAdd(){
        //获取菜单父级
        return $this->render('add');
    }
}