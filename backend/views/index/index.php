<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/10/31
 * Time: 下午2:14
 */
?>

<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">layui 后台布局</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <?php include 'index-top-left.php';?>
        <?php include 'index-top-right.php';?>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <?php include 'index-left-menu.php';?>
        </div>
    </div>

    <div class="layui-body iframe-body-top">
        <!-- 内容主体区域 -->
        <?php include 'index-left-content.php';?>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
