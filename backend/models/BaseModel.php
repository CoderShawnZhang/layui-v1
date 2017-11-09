<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/9
 * Time: 下午4:59
 */

namespace backend\models;


use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord
{
    public static function search($params=[]){
        $class = get_called_class();
        $query = $class::find();
        $thisModel = new $class;

        $validators = $thisModel->getValidators();
        foreach ($validators as $key => $value) {
            foreach ($value->attributes as $k => $v) {
                if (array_key_exists($v,$params)){
                    $op = self::Operator($params[$v]);
                    $query->andWhere([$op,$v,$params[$v][$op]]);
                }
            }
        }

//        var_dump($query->createCommand()->getRawSql());die;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [

            ],
            'pagination'=>[

            ]
        ]);

        return $dataProvider->getModels();
    }

    private static function Operator($operator){
        $operator = array_keys($operator)[0];
        return $operator;
    }
}