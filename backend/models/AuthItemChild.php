<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/9
 * Time: 下午6:00
 */

namespace backend\models;


class AuthItemChild extends BaseModel
{
    public static function tableName()
    {
        return '{{%auth_item_child}}';
    }

    public function rules()
    {
        return[
            [['parent','child'],'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'parent' => '角色',
            'child' => '权限'
        ];
    }
}