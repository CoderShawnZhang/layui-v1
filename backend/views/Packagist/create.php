<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/16
 * Time: 下午5:27
 */

echo '开发依赖包';
//开发依赖包是，包的composer.json里面 repositories 使用国内镜像。安装完包的依赖后，要删除掉.安装包的依赖是为测试而用
//自动加载类  require_once __DIR__ . '/vendor/autoload.php';
//加载自定义依赖包：
/*
    "repositories": [
        {
            "type": "composer",
            "url": "https://packagist.phpcomposer.com"
        },
        {
            "packagist": false
        }
    ]
*/

//如果仅仅增加了一些描述，应该是不打算更新任何库。这种情况下，只需 composer update nothing：