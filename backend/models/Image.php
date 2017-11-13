<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property string $src
 * @property string $name
 * @property string $size
 * @property integer $width
 * @property integer $height
 * @property string $base64
 * @property integer $status
 */
class Image extends \yii\db\ActiveRecord
{

    const IMAGE_STATUS_YES = 0;//正常
    const IMAGE_STATUS_NO = 1;//禁用
     /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['width', 'height', 'status'], 'integer'],
            [['base64'], 'string'],
            [['src'], 'string', 'max' => 200],
            [['name'], 'string', 'max' => 100],
            [['size'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'src' => Yii::t('app', 'Src'),
            'name' => Yii::t('app', 'Name'),
            'size' => Yii::t('app', 'Size'),
            'width' => Yii::t('app', 'Width'),
            'height' => Yii::t('app', 'Height'),
            'base64' => Yii::t('app', 'Base64'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
