<?php
/**
 * 用户拥有的角色
 */

namespace backend\models;


class AuthAssignment extends BaseModel
{
    public static function tableName()
    {
        return '{{%auth_assignment}}';
    }

    public function rules()
    {
        return [
            [['item_name','user_id'],'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'item_name' => '角色名称',
            'user_id' => '用户id',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }
}