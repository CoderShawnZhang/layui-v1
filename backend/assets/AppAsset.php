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
        'layui/layui.js',
        'js/nav.js',
        'js/tabExtend.js'
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
