<?php

/**
 * 进度条小部件
 */
namespace app\YiiFramework2\Widgets\ProgressWidget;

use yii\base\Widget;
class ProgressWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('Progress');
    }
}