<?php

/**
 * 面包屑导航
 */
namespace app\YiiFramework2\Widgets\BlockquoteWidget;
use yii\base\Widget;
use yii\helpers\Html;

class BlockquoteWidget extends Widget
{
    public $content;

    public function init()
    {
        parent::init();
//        ob_start();
    }

    public function run()
    {
//        $content = ob_get_clean();
        $arr = explode(',',$this->content);
        return $this->render('blockquote',['content'=>$arr]);
    }
}