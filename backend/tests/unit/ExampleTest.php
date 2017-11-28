<?php


class ExampleTest extends \Codeception\Test\Unit
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

    /*
     * test
     */
    public function someFeature()
    {

    }

    /**
     * @test
     */
    public function validation(){
        $user = new \app\models\Setting();
        $user->name = null;
        $this->assertFalse($user->validate(['name']));
        $user->name = 'qqqqqqqqqqqqqqqqqqgqgggg';
        $this->assertFalse($user->validate(['name']));
        $user->name = 'davert';
        $this->assertTrue($user->validate(['name']));
    }
}