<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/28
 * Time: 下午3:33
 */
namespace backend\tests\acceptance;
class UserCest
{
    function showUserProfile(AcceptanceTester $I,\Page\Login $loginPage)
    {
        $loginPage->login('admin','123456');
        $I->amOnPage('/authentication/login');
        $I->see('认证成功用户信息');
    }
}