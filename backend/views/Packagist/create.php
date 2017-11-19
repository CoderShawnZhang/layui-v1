<fieldset class="layui-elem-field site-demo-button">
    <legend>菜单操作</legend>
    <div style="margin: 15px;">
        <!--        <button class="layui-btn layui-btn-primary">新增菜单</button>-->
        <div class="layui-input-inline">
            <input type="tel" name="phone" lay-verify="phone" autocomplete="off" class="layui-input" placeholder="查询菜单">
        </div>
        <button class="layui-btn layui-btn-warm">查询</button>
        <button class="layui-btn"><a href="/menu/add">新增菜单</a></button>
        <button class="layui-btn layui-btn-danger">禁用选中</button>
        <!--        <button class="layui-btn layui-btn-normal">删除选中</button>-->
        <!--        <button class="layui-btn layui-btn-warm">暖色按钮</button>-->
        <!--        <button class="layui-btn layui-btn-danger">警告按钮</button>-->
        <!--        <button class="layui-btn layui-btn-disabled">禁用按钮</button>-->
    </div>
</fieldset>
<table class="layui-table" lay-data="{height:'full-160', url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/packagist/pack-list') ;?>', page:true, id:'test'}" lay-filter="test">
    <thead>
    <tr>
        <th lay-data="{checkbox:true, fixed: true}"></th>
        <th lay-data="{field:'file', width:180, sort: true}">ID</th>
        <th lay-data="{field:'tt', width:180, sort: true}">用户名</th>
        <th lay-data="{fixed: 'right', toolbar: '#barOption', width:200, align:'center'}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="barOption">
    <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script>
    layui.use(['table'],function(){
        var table = layui.table;
    });
</script>
