<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@backend/assets';

//    public $baseUrl = '@web';
    public $css = [
        'layui/css/layui.css',
        'css/main.css',
        '//at.alicdn.com/t/font_tnyc012u2rlwstt9.css',
    ];
    public $js = [
//        'js/test.js',
        'layui/layui.js',
        'js/tabExtend.js',
        'js/nav.js',
        'js/main.js'
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//        'light\widgets\SweetSubmitAsset'
    ];

    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
    ];
}
