<?php


class aaaTest extends \Codeception\Test\Unit
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
    public function testSomeFeature()
    {
        $a = 1;
        $b= 1;
    }

    public function testAbc(){
        $a = 10;
        $b = 20;
        $c = 100;

        $d = $a + $b;

        if($c > $d){
            codecept_debug('11111');
        }else{
            codecept_debug('22222');
        }
    }
}