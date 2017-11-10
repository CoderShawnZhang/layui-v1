<?php
/**
 * 小部件
 * 将小部件以挂载的方式显示在页面
 *
CREATE TABLE `alw_order`.`widget` (
`id` int(10) NOT NULL,
`name` varchar(50) COMMENT '小部件名称',
`author` varchar(20) COMMENT '作者',
`status` tinyint(1) COMMENT '状态：1启用，0禁用，2卸载',
PRIMARY KEY (`id`)
) COMMENT='';
ALTER TABLE `alw_order`.`widget` ADD COLUMN `route` varchar(50) COMMENT '小部件路由' AFTER `status`;
ALTER TABLE `alw_order`.`widget` CHANGE COLUMN `route` `routeName` varchar(50) DEFAULT NULL COMMENT '小部件路由';
 */

namespace backend\controllers;


use backend\models\Widget;

class WidgetsController extends BaseController
{
    public function actionList(){

        return $this->render('list');
    }

    public function actionWidgetList()
    {
        $widget = Widget::find()->asArray()->all();

        return $this->tableDataHeader($widget);
    }

    public function actionWidgetShow(){
        $widgetID = \Yii::$app->request->get('widgetID');
        $widget = Widget::find()->where(['id'=>$widgetID])->asArray()->one();
        $params = "['message'=>'我要生姑娘了！！！']";//条件以字符串传入
        return $this->render('widgetshow',['widgetName'=>$widget['routeName'],'widgetParams'=>$widget['params']]);
    }
}