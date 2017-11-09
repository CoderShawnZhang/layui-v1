<?php
/**
 * 权限&角色表
 * type=1是角色，type=2为权限
 */

namespace backend\models;


class AuthItem extends BaseModel
{
    const TYPE_ROLE = 1;
    const TYPE_PERMISSION = 2;
    public static function tableName()
    {
        return '{{%auth_item}}';
    }

    public function rules()
    {
        return [
            [['name','type'],'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => '名称',
            'type' => '类型',
            'description' => '描述',
            'rule_name' => '规则名',
            'data' => 'data',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

}