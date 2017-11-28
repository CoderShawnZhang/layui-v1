<?php

/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/28
 * Time: 下午5:11
 */
namespace backend\YiiFramework2\TestClass;

class A
{
    /**
     * 材料A
     * @return int
     */
    public function getName(){
        return $this->getAmount();
    }

    /**
     * 材料B
     */
    public function getMetari(){
        return $this->getAmount()-1;
    }

    /**
     * 计算用量
     */
    private function getAmount(){
        return 1;
    }
}