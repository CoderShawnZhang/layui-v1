<?php
namespace Page;

class Login
{
    // include url of current page
    public static $URL = '/authentication/index';

    public static $usernameField = '#login_form input[name=mobile]';
    public static $passwordField = '#login_form input[name=password]';
    public static $loginButton = 'Login';

    /**
     * Declare UI map for this page here. CSS or XPath allowed.
     * public static $usernameField = '#username';
     * public static $formSubmitButton = "#mainForm input[type=submit]";
     */

    protected $tester;

    public function __construct(\AcceptanceTester $I) {
        $this->tester = $I;
    }

    public function login($name,$password){
        $I = $this->tester;

        $I->amOnPage(self::$URL);
        $I->fillField(self::$usernameField,$name);
        $I->fillField(self::$passwordField,$password);
        $I->click(self::$loginButton);

        return $this;
    }
}
