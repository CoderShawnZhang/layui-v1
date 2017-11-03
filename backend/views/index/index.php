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
        <div class="layui-logo">Yii Framework 2.0 权威指南 </div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <?= $this->render('index-top-left.php');?>
        <?= $this->render('index-top-right.php');?>
    </div>

    <div class="layui-side layui-bg-black">

        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <?= $this->render('index-left-menu.php');?>
        </div>
    </div>

    <div class="layui-body iframe-body-top">
        <!-- 内容主体区域 -->
        <?= $this->render('index-left-content.php');?>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
        <table lay-filter="demo">
            <thead>
            <tr>
                <th lay-data="{field:'username', width:100}">昵称</th>
                <th lay-data="{field:'experience', width:80, sort:true}">积分</th>
                <th lay-data="{field:'sign', width:300}">签名</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>贤心1</td>
                <td>66</td>
                <td>人生就像是一场修行a</td>
            </tr>
            <tr>
                <td>贤心2</td>
                <td>88</td>
                <td>人生就像是一场修行b</td>
            </tr>
            <tr>
                <td>贤心3</td>
                <td>33</td>
                <td>人生就像是一场修行c</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    //Demo111
    layui.use(['form','element','table'], function(){
        var form = layui.form;
        var element = layui.element;
        var table = layui.table;
        //执行渲染

        //转换静态表格
        table.init('demo', {
            height: 315 //设置高度
            //支持所有基础参数
        });

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
</script>

