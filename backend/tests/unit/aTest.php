<?php
namespace example;


use stdClass;

class aTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testMe()
    {
        echo 554; // 无效的
        codecept_debug(11211);
        $obj = new stdClass();
        $obj->id = 1;
        codecept_debug($obj);
        codecept_debug([1, 2]);
    }
}