<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/11/2
 * Time: 下午4:10
 */

namespace backend\models;


use yii\db\ActiveRecord;

class UserTable extends ActiveRecord
{
    const USER_STATE_NOMAL = 1;
    const USER_STATE_STOP = 0;
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return parent::rules(); // TODO: Change the autogenerated stub
    }

    public function attributeLabels()
    {
        return parent::attributeLabels(); // TODO: Change the autogenerated stub
    }
}