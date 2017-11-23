<?php

/**
 * 验证系统设置项
 */
namespace app\YiiFramework2\Validate;

use app\models\Setting;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use yii\validators\Validator;
class SettingValidator extends Validator
{
    protected $ErrorMsg = '自定义验证错误提示!';

    /**
     *
     * 服务端验证
     *
     * @param \yii\base\Model $model
     * @param string $attribute
     */
    public function validateAttribute($model, $attribute)
    {
        //$attributes, 等待验证的输入值，可以是字符串，也可以是数组
        //$message, 自定义的错误信息
        //$on, 使用的场景，根据scenarios来判断，可以是字符串，也可以是数组。
        //$except, 不开启规则验证的场景。可以是字符串，也可以是数组。

        $exist = Setting::find()->where([$attribute=>$model->name])->one();
        if($exist) {
            $this->addError($model, $attribute, $this->ErrorMsg);
        }
    }

    /**
     *
     * 客户端验证
     *
     * @param \yii\base\Model $model
     * @param string $attribute
     * @param \yii\web\View $view
     * @return null|string
     */
    public function clientValidateAttribute($model, $attribute, $view)
    {
        $message = $this->ErrorMsg;
        return <<<JS
messages.push('{$message}');
JS;
    }
}