<?php
// This is global bootstrap for autoloading
define('YII_ENV', 'test');
defined('YII_DEBUG') or define('YII_DEBUG', true);


//require_once(__DIR__ . '/../../backend/YiiFramework2/TestClass/A.php');
//require_once(__DIR__ . '/../../backend/YiiFramework2/TestClass/Play.php');
//require_once(__DIR__ . '/../../backend/models/User.php');

require_once(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require __DIR__ .'/../../vendor/autoload.php';

\Codeception\Util\Autoload::addNamespace('Tests\Extension', __DIR__ . DIRECTORY_SEPARATOR . 'extension');
