<?php 
$I = new AcceptanceTester($scenario);
//$I->wantTo('log in as regular user');
//$I->amOnPage('/authentication/index');
//$I->see('立即认证');   //检测页面是否有指定关键字
//$I->fillField('mobile','admin');
//$I->fillField('password','123456');
//$I->click('Login');
//$I->see('认证成功');


$I->amOnPage('/authentication/index');
$I->submitForm('#login_form',[
    'mobile' => 'admin',
    'password' => '123456',
]);
$I->see('认证成功');
?>