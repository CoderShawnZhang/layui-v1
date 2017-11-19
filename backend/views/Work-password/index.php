<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2017/11/19
 * Time: 下午4:12
 */

    echo '处理密码';
    echo $hash = Yii::$app->getSecurity()->generatePasswordHash('123456');

if (Yii::$app->getSecurity()->validatePassword('123456', $hash)) {
    echo 'ok';
} else {
    echo 'error';
}