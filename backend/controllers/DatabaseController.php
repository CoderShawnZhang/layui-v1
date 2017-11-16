<?php
/**
 * 数据库操作
 */

namespace backend\controllers;


use backend\YiiFramework2\Database\Export\ExportDataTable;
use yii\helpers\Html;
use Yii;
global $process;
class DatabaseController extends BaseController
{


    public $enableCsrfValidation = false;
    /**
     * 列出数据库所有数据表
     */
    public function actionIndex(){
        return $this->render('index');
    }

    public function actionTableList(){
        $tableList = \Yii::$app->db->createCommand('show table status from alw_order')->queryAll();
        return $this->tableDataHeader($tableList);
    }

    /**
     * 备份整个数据库
     */
    public function actionBack(){


        $tableList = \Yii::$app->db->createCommand('show table status from alw_order')->queryAll();

        $tableSql = "\n\nSET NAMES utf8mb4;\nSET FOREIGN_KEY_CHECKS = 0;\nDROP TABLE IF EXISTS `user`;\n\n";
        foreach($tableList as $key => $val){
            $table = \Yii::$app->db->createCommand('SHOW CREATE TABLE '.$val['Name'])->queryOne();
            $tableSql .= $table['Create Table'].";\n\n";
            $export = new ExportDataTable();
            if(!$export->_insert_record($val['Name'])){
                continue;
            }
            Yii::$app->params['backProcess'] =  Yii::$app->params['backProcess'] + 10;
        }


        $tableSql .= "COMMIT;SET FOREIGN_KEY_CHECKS = 1;\n\n";
        $putres = file_put_contents("../DataSql/".time().".sql", Html::encode($tableSql));
        sleep(4);
        $resultTxt = '备份成功！';
        if(!$putres){
            $resultTxt = '备份失败！';
        }
        return $this->renderAjax('back',['result'=>$resultTxt]);
    }

    public function actionJisuan(){
        echo 12;
    }

    /**
     * RBAC 4张表涉及到主外键，所以导出SQL文件时要注意顺序
     */
    private function rbacOp(){
        //auth_rule,auth_item,auth_assignment,auth_item_child
    }

    /**
     * 导出数据库
     */
    public function actionExportDatabase(){

    }

    /**
     * 导入数据库
     */
    public function actionImportDatabase(){

    }

    /**
     * 导出数据表
     */
    public function actionExportTable(){

    }

    /**
     * 导入数据表
     */
    public function actionImportTable(){

    }

    /**
     * 数据表-数据
     */
    public function actionData(){

        return $this->render('data');
    }
}