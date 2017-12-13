<?php


class tttTest extends \Codeception\Test\Unit
{
//    use \Codeception\Specify;
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

    }

    public function testDemo(){
        $this->specify('环节1:测试time函数', function(){
            //断言失败了不会往这个函数的代码下面跑而已,但外面还是会继续往下跑的
            $this->assertInternalType('string', time());          //失败
            $this->assertInternalType('string', md5(time()));     //成功,但上面失败,跑不到这里,退出这一次的specify
        });

        //无论上面的specify里成还是败都还会继续跑这里
        $this->assertTrue(true);
        $this->specify('环节2:测试date函数', function(){
            $testTimeStamp = 1447171200;
            $this->assertNotEquals(1990, date('Y', $testTimeStamp));
            $this->assertEquals(2015, date('Y', $testTimeStamp));
            $this->assertEquals(5, count(explode('-', date('Y-m-d'))));     //失败
        });

        $this->assertTrue(false, '外面也失败了');
    }

}