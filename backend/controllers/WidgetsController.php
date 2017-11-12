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
    /**
     * 禁用
     */
    const WIDGET_STATUS_DISABLE = 0;
    const WIDGET_STATUS_TXT_DISABLE = '禁用';
    /**
     * 启用
     */
    const WIDGET_STATUS_NORMAL = 1;
    const WIDGET_STATUS_TXT_NORMAL = '启用';
    /**
     * 卸载
     */
    const WIDGET_STATUS_UNINSTALL = 2;//卸载
    const WIDGET_STATUS_TXT_UNINSTALL = '卸载';

    /**
     * 组合小部件常量数组
     *
     * @var array
     */
    public static $widgetStatus =[
        self::WIDGET_STATUS_DISABLE=>['txt'=>self::WIDGET_STATUS_TXT_DISABLE,'color'=>'green'],
        self::WIDGET_STATUS_NORMAL=>['txt'=>self::WIDGET_STATUS_TXT_NORMAL,'color'=>'green'],
        self::WIDGET_STATUS_UNINSTALL=>['txt'=>self::WIDGET_STATUS_TXT_UNINSTALL,'color'=>'green'],
        ];

    /**
     * 渲染小部件页面
     *
     *
     * @return string 渲染小部件view
     */
    public function actionList(){
        return $this->render('list');
    }

    /**
     * 获取小部件列表
     *
     *
     * @return string 返回layui-table 规定使用格式
     */
    public function actionWidgetList()
    {

        $widget = Widget::find()->asArray()->all();
        foreach($widget as $key => $val){
            $widget[$key]['status'] = $this->WidgetStatus($val['status']);
        }

        return $this->tableDataHeader($widget);
    }

    /**
     * 返回小部件中文状态文字显示
     * （将需要写死数据常量化）
     *
     * @param $status 小部件状态
     *
     * @return string 中文状态
     */
    private function WidgetStatus($status){
        if(isset(self::$widgetStatus[$status]['color'])){
            return '<span style="color:'.self::$widgetStatus[$status]['color'].'">'.self::$widgetStatus[$status]['txt'].'</span>';
        }
        return self::$widgetStatus[$status]['txt'];
    }

    /**
     * 展示小部件功能
     *
     *
     * @return string 渲染小部件展示页
     */
    public function actionWidgetShow(){
        $widgetID = \Yii::$app->request->get('widgetID');
        $widget = Widget::find()->where(['id'=>$widgetID])->asArray()->one();
        return $this->render('widgetshow',['widgetName'=>$widget['routeName'],'widgetParams'=>$widget['params']]);
    }
}