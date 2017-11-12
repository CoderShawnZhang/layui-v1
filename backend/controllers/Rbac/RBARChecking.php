<?php

/**
 * RBAC 过滤
 */
class RBARChecking
{
    /**
     * 过滤Controller/Action
     */
    public function ignoreController(){
        $ignoreController = [
            'authentication/index',
            'authentication/login',
            'authentication/logout',
            'error/no_permission',
            'error/404',
        ];
        return $ignoreController;
    }

    /**
     * 过滤页面
     */
    public function ignorePage(){
        $ignorePage = [

        ];
    }

    /**
     * 过滤用户
     */
    public function ignoreUser(){

    }
}