<?php

/**
 * 进度条小部件
 *
 * 小部件的样式引用 Bootstrap
 */
namespace app\YiiFramework2\Widgets\ProgressWidget;

use yii\base\Widget;
use yii\helpers\Html;

class ProgressWidget extends Widget
{
    public $a;

    public $label;
    public $percent;
    public $showpercent = false;

    public $options;

    public $barOptions = [];

    public function init()
    {
        parent::init();
        $defaultOptions = [
            "lay-filter" => "demo"
        ];
        if($this->showpercent) {
            $defaultOptions['lay-showpercent'] = 'true';
        }

        $this->options = array_merge($defaultOptions, $this->options);
        Html::addCssClass($this->options, ['widget' => 'layui-progress layui-progress-big']);//外层div 初始class
    }


    public function run()
    {
        return implode("\n", [
            Html::beginTag('div', $this->options),
                $this->renderProgress(),
                Html::endTag('div'),
            ]) . "\n";
    }
    protected function renderProgress(){
        $defaultOptions = [
            'role' => 'progressbar',
            'aria-valuenow' => $this->percent,
            'aria-valuemin' => 0,
            'aria-valuemax' => 100,
            'lay-percent' => "{$this->percent}%",
//            'style' => "width:{$this->percent}%",
        ];

        $options = array_merge($defaultOptions, $this->barOptions);
        Html::addCssClass($options, ['widget' => 'layui-progress-bar layui-bg-cyan']);
        $out = Html::beginTag('div', $options);
        $out .= $this->label;
        $out .= Html::tag('span', \Yii::t('yii', '{percent}% Complete', ['percent' => $this->percent]), [
            'class' => 'sr-only'
        ]);
        $out .= Html::endTag('div');
        return $out;
    }
}