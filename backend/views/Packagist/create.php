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



//开发依赖包的命名规格是根据 composer.json 里 psr-4定义的。
//例如composer.json 定义如下：
/*
    "autoload": {
        "psr-4": {
            "LaravelAcademy\\UrlScanner\\": "src/"
        }
    }
*/
//类的命名空间为：namespace LaravelAcademy\UrlScanner\Url;   Url为src目录下的  注意:命名空间要跳过 src

/*
 * git 提交
$ git add .
$ git commit -m "gogogo"
$ git push


git init
git add .
git commit -m "First commit"
git remote add origin git@github.com:username/hello.git
git push origin master
*/