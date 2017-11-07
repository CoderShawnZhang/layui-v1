<?php
/**
 * 菜单管理--模型
 * User: anlewo0208
 * Date: 2017/11/6
 * Time: 下午5:44
 */

namespace backend\models;


use yii\db\ActiveRecord;

class Menu extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%menu}}';
    }
    
    public function rules()
    {
        return [];
    }

    public function attributeLabels()
    {
        return [

        ];
    }
}