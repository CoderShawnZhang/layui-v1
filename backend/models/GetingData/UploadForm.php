<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/13
 * Time: 下午2:27
 */

namespace backend\models\GetingData;


use yii\db\ActiveRecord;

class UploadForm extends ActiveRecord
{
    public $imageFile;

    public static function tableName()
    {
        return '{{%image}}';
    }

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function attributeLabels()
    {
        return [

        ];
    }

    public function upload(){
        if ($this->validate()) {
            $this->imageFile->saveAs('../../backend/uploads/'.$this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}