<?php
namespace example;


class HelloWorldTest extends \Codeception\Test\Unit
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

    /**
     * 测试我
     */
    public function testMe()
    {
        // 等价
        expect_that(true);
        expect_that(1);
        $this->assertTrue(true);

        // 等价
        expect_not(false);
        $this->assertFalse(false);

        // 等价
        expect(2)->equals(1 + 1);
        $this->assertEquals(2, 1 + 1);

        $obj = new \stdClass();
        $obj->id = 1;
        // 注意属性和成员变量的区别, 下面方法内部是使用反射来实现的, 有的类大量使用了getter和setter, so有的属性是反射不出来的
        $this->assertAttributeNotEquals( 2, 'id', $obj );

        $arr = [1,2,3,4,5];
        $eat = ['apple' => 11];
        // 断言一个数组个数是否等于5
        $this->assertEquals(5, count($arr), '数组长度不等于5');
        // 断言一个用户变量是 stdClass 这个类的实例或子类实例
        $this->assertInstanceOf('stdClass', $obj, '不是stdClass的事例');
        // 断言一个数大于1
        $this->assertGreaterThan (1, $arr[2]);
        // 断言数组里是包含了数字3这个值的
        $this->assertContains(3, $arr, '数组不包含3');
        //断言一个数组里会有一个叫choose_count的下标
        $this->assertArrayHasKey('apple', $eat, '数组key不包含apple');
    }
}