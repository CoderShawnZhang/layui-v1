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

    public $separator = '--';

    public function init()
    {
        parent::init();
//        ob_start();
    }

    public function run()
    {
        return $this->render('blockquote',['content'=>$this->content,'separator'=>$this->separator]);
    }
}