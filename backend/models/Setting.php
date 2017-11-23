<?php

namespace app\models;

use app\YiiFramework2\Validate\SettingValidator;
use backend\models\BaseModel;
use Yii;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property string $name
 * @property string $value
 */
class Setting extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], SettingValidator::className(),'message'=>1111],
//            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
            [['value'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
            'title' => Yii::t('app', 'Title'),
        ];
    }
}
