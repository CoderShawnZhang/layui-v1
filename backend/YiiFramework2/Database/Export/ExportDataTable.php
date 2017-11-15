<?php

/**
 * 导出数据表
 */
namespace backend\YiiFramework2\Database\Export;
use yii\helpers\Html;
class ExportDataTable
{

    private $ds = "\n";

    /**
     * 插入单条记录
     * @param $table
     * @param $num_fields
     * @param $record
     *
     * @return string
     */
    public function _insert_record($table){
        ini_set('memory_limit', '256M');
        $insert = "";
        $insert .= "insert into ".$table."(&columns) VALUES";
        $columns = "";
        $values = "";

        $record = \Yii::$app->db->createCommand('select * from '.$table)->queryAll();
        if(count($record)==0){
            return false;
        }

        /**
         * 组合columns
         */
        foreach($record[0] as $k=>$v){
            $columns .="`".$k."`,";
        }
        $columns = trim($columns,',');

        /**
         * 表列类型
         */
        $columnsType = $this->_get_columns_type($table);

        /**
         * 组合values
         */
        foreach($record as $k=>$v){
            $values .="(";
            foreach ($v as $key => $val){
                if($columnsType[$key][0]['null'] == 'NO'){
                    if(empty($val)){
                        $values .= "'',";
                    }
                }elseif ($columnsType[$key][0]['null'] == 'YES'){
                    if(empty($val)){
                        $values .= null.",";
                    }
                } else{
                    $values .= "'".$val."',";
                }
            }
            $values = trim($values,',');
            $values .= ")\n,";
        }
        $values = trim($values,',');

        $columns = trim($columns,',');
        $insert = str_replace('&columns',$columns,$insert);
        $insert = $insert.$values.";";

        $putres = file_put_contents("../DataSql/导出数据".$table.time().".sql", $insert);
        return $putres;
    }

    private function _get_type($type){
        switch ($type){
            case 'varchar':
            case 'int':
            case 'time':
        }
    }
    /**
     *
     */
    private function _get_columns_type($table){
        $columnsType = [];
        $columnsList = \Yii::$app->db->createCommand('SHOW FULL COLUMNS FROM '.$table)->queryAll();
        foreach($columnsList as $key => $val) {
            $columnsType[$val['Field']][] = $val;
        }
        return $columnsType;
    }
}