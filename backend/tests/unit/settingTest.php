<?php


class settingTest extends \Codeception\Test\Unit
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

    public function testCreateInstance(){
        $set = new \app\models\Setting();
        $res = $set->createSetting('abc','321','测试数据');
        $this->assertInstanceOf('app\models\Setting',$res,'不是Setting对象');
    }

    /**
     * @depends testCreateInstance
     */
    public function testParams(){

    }
}