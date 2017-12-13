<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('http://www.baidu.com');
$I->click('Sign In');
$I->see('Home');