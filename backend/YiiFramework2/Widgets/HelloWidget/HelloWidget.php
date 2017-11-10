<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/10
 * Time: 下午3:55
 *
 */
namespace app\YiiFramework2\Widgets\HelloWidget;

use yii\base\Widget;
use yii\helpers\Html;
class HelloWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if($this->message === null){
            $this->message = '<div class="color:red;">Hello World</div>';
        }else{
            $this->message = '<div style="color:red;">'.$this->message.'</div>';
        }
    }

    public function run(){
//        return $this->render('hello');
        return $this->message;
    }
}