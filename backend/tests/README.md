【中文版】PHP全栈测试框架 
===============================
 CodeCeption 快速入门指南
===============================
PHP 测试框架 CodeCeption 是设计为开箱即用的，安装步骤简单并且没有外部依赖（当然PHP除外）。
只需要一个配置步骤你就可以以用户视角来测试你的web应用程序。

1.Download
-------------------
将Codeception的phar包下载到你的web应用程序根目录下。

下载CodeCeption [官网下载](http://codeception.com/codecept.phar) [github仓库](https://github.com/Codeception/Codeception)

或用Linux命令下载:
```
wget http://codeception.com/codecept.phar
```
通过Composer安装:
```
php composer require "codeception/codeception:*"
```
`这种情况使用 ./vendor/bin/codecept 命令来使用命令来使用CodeCeption phar`

安装到全局环境:
```
sudo curl -LsS http://codeception.com/codecept.phar -o /usr/local/bin/codecept sudo chmod a+x /usr/local/bin/codecept
```
`这种情况用直接用 codecept 命令来使用CodeCeption phar`

2.Install
-------------------
命令行下进入文件的目录，并执行：
```
php codecept bootstrap
```
`这样就创建了codeception.yml 文件和 tests目录`

3.Create Test
-------------------
生成你的第一个验收测试（Acceptance Test），模拟一个真实用户访问你的站点的验收测试行为。
```
codecept generate:cept acceptance Welcome
codecept generate:test unit example/HelloWorld 或 g:test unit example/HelloWorld

```
`Codeception情景测试称为Cepts。`

3.写一个基本测试
-------------------
``现在就写你的第一个测试，编辑我们刚刚已经创建的文件 tests/acceptance/WelcomeCept.php
```
<?php
    $I = new AcceptanceTester($scenario);
    $I->wantTo('ensure that frontpage works');
    $I->amOnPage('/'); 
    $I->see('Home');
?>
```
5.配置 Acceptance Tests
-------------------
首先确定你的本地你本地开发的web应用程序可以正常访问，并且把url填到: tests/acceptance.suite.yml
```
class_name: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: {你web应用程序的url}
        - \Helper\Acceptance
```
6.运行
-------------------
Codeception 通过 'run' 命令执行
```
codecept run
```
这将使用PhpBrowser执行我们的Welcome 测试，PHP脚本去检查HTML页面的内容，点击链接、填写表单、并且提交POST和GET请求。对于更复杂的测试需要一个浏览器使用Selenium的WebDriver模块。

假如一切都对并且在页面里有“Home”文本的话，我们将看到如下输出：
```
Codeception PHP Testing Framework v2.1.4
Powered by PHPUnit 4.8.18 by Sebastian Bergmann and contributors.

Acceptance Tests (1) -----------------------------------------------------------------------------------------
Ensure that frontpage works (WelcomeCept)                                                                     Ok
-------------------------------------------------------------------------------------------------------------------

Functional Tests (0) ------------------------
---------------------------------------------

Unit Tests (0) ------------------------------
---------------------------------------------

Time: 6.48 seconds, Memory: 8.50Mb

OK (1 test, 4 assertions)
```

ok,就这么轻易滴搞定了，是不是觉得Codeception很简单呢，赶快去试试吧~

此文章是根据官网QuickStart翻译而来，请尊重他人的劳动成果，如转载请说明出处



运行单元测试：
codecept run unit ExampleTest.php
