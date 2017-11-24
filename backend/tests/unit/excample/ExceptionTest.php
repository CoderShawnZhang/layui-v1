<?php
namespace example\models;


use yii\web\ServerErrorHttpException;
use yii\web\UnprocessableEntityHttpException;

class ExceptionTest extends \Codeception\Test\Unit
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
     * test ok
     *
     * @throws UnprocessableEntityHttpException
     */
    public function testExceptionOK1()
    {
        $this->expectException(UnprocessableEntityHttpException::class);
        throw new UnprocessableEntityHttpException();
    }

    /**
     * test ok
     *
     * @expectedException \yii\web\UnprocessableEntityHttpException
     *
     * @throws UnprocessableEntityHttpException
     */
    public function testExceptionOK2()
    {
        throw new UnprocessableEntityHttpException();
    }

    public function testExceptionOK3()
    {
        $this->expectExceptionCode(9527);
        throw new UnprocessableEntityHttpException('test failed', 9527);
    }

    public function testExceptionOK4()
    {
        $this->expectExceptionMessage('test failed');
        throw new UnprocessableEntityHttpException('test failed', 9527);
    }

    // 这里会报错, 期望抛出异常, 但是没有抛出
    public function testExceptionFailed1()
    {
        $this->expectException(UnprocessableEntityHttpException::class);
    }

    // 这里也会报错, 无故抛出异常
    public function testExceptionFailed2()
    {
        throw new UnprocessableEntityHttpException();
    }

    // 也会报错, 没有抛出期望的异常
    public function testExceptionFailed3()
    {
        $this->expectException(UnprocessableEntityHttpException::class);
        throw new ServerErrorHttpException();
    }

}