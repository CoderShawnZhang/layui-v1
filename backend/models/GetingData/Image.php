<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/13
 * Time: 下午2:57
 */

namespace backend\models\GetingData;


use yii\db\ActiveRecord;

class Image extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%image}}';
    }

    public function rules()
    {
        return [

        ];
    }

    public function attributeLabels()
    {
        return [
            'src'=>'图片访问地址',
            'name'=>'图片名称',
            'size'=>'图片大小',
            'width'=>'图片宽度',
            'height'=>'图片高度',
            'base64'=>'图片转码',
            'status'=>'图片状态'
        ];
    }
}