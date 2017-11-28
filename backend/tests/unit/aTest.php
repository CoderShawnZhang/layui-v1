<?php
//http://www.kkh86.com/it/codeception/guide-unit-test-depends.html
namespace unit;

use backend\models\User;
use backend\YiiFramework2\TestClass\A;
use backend\YiiFramework2\TestClass\Play;
use Codeception\Test\Unit;
use PHPUnit_Framework_TestResult;

class aTest extends Unit
{
//    public function run(PHPUnit_Framework_TestResult $result = null)
//    {
//        return 1;
//    }
//
//    public function count()
//    {
//        return 1;
//    }

    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
        codecept_debug('删除了比赛');
    }

    // tests
    public function testMe()
    {
        $a = new A();
        $this->assertGreaterThan(0,$a->getName(),'getXX的值居然不大于0!');
        $this->assertEquals(0,$a->getMetari(),'材料值只能是0');

        codecept_debug('创建游戏比赛');
        $matche = new Play();
        $this->assertTrue($matche->start(),'111');
        codecept_debug('比赛开始了');
        $this->assertTrue($matche->isPlaying(),'222');
        codecept_debug('正在游戏中...');
        $user = new User();
        $this->assertTrue($matche->addMember($user),'333');
        codecept_debug('有新用户登录');
        $this->assertEquals(1,$matche->getMemberCount(),'444');
        codecept_debug('线上人数还允许登录');
    }
}