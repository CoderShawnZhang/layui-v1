<?php
/**
 * 小部件数据模型
 */

namespace backend\models;


class Widget extends BaseModel
{
    public static function tableName()
    {
        return '{{%widget}}';
    }

    public function rules()
    {
        return [
            [['id','status'],'int'],
            [['name','author','route'],'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '小部件ID',
            'name' => '小部件名称',
            'author' => '作者',
            'status' => '小部件状态',
            'route' => '小部件路由'
        ];
    }

}