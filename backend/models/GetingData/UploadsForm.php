<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/13
 * Time: 下午2:27
 */

namespace backend\models\GetingData;


use yii\db\ActiveRecord;

class UploadsForm extends ActiveRecord
{
    public $imageFiles;

    public static function tableName()
    {
        return '{{%image}}';
    }

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 10],
        ];
    }

    public function attributeLabels()
    {
        return [

        ];
    }

    public function uploads(){
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {

                $file->saveAs('../../backend/uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            var_dump($this->getErrors());die;
            return false;
        }
    }
}