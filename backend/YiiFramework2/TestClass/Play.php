<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/28
 * Time: 下午5:39
 */

namespace backend\YiiFramework2\TestClas;


use backend\models\User;

class Play
{
    /**
     * 开始游戏
     */
    public function start(){
        return true;
    }

    /**
     * 正在游戏中
     */
    public function isPlaying(){
        return true;
    }

    /**
     * 新角色上线
     */
    public function addMember(User $user){
        return true;
    }

    /**
     * 获取游戏在线人数
     */
    public function getMemberCount(){
        return 1;
    }
}