<?php

use Page\Login as LoginPage;

/*
$I = new AcceptanceTester($scenario);
$I->wantTo('开始测试模拟登陆');
$I->amOnPage(LoginPage::$URL);
$I->fillField(LoginPage::$usernameField,'admin');
$I->fillField(LoginPage::$passwordField,'123456');
$I->click(LoginPage::$loginButton);
$I->see('认证成功');
*/


$I =  new AcceptanceTester($scenario);
$loginPage = new \Page\Login($I);
$loginPage->login('admin','123456');
$I->amOnPage('/authentication/login');
codecept_debug('4444444');
//$I->see('认证成功用户信息');

/*
$I = new AcceptanceTester($scenario);
$loginPage = new \Page\Login($I);
$User = new \backend\tests\acceptance\UserCest();
$User->showUserProfile($I,$loginPage);
*/