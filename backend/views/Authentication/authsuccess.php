<!--认证成功-->
<?php $url = Yii::$app->urlManager->createAbsoluteUrl('/authentication/get-identity') ?>
<div style="text-align: center;height: 300px;">
    <i class="layui-icon" style="font-size: 260px; color: #009688;">&#xe60c;</i>
</div>
    <fieldset class="layui-elem-field layui-field-title">
        <legend style="color: #009688;">认证成功用户信息</legend>
        <table class="layui-table" lay-data="{url:'<?=$url;?>', page:false, id:'test',loading:true,width:1450}" lay-filter="test">
            <thead>
            <tr>
<!--                <th lay-data="{checkbox:true, fixed: true}"></th>-->
                <th lay-data="{field:'id', width:80, fixed: true, sort: true}">ID</th>
                <th lay-data="{field:'username', width:120, sort: true, edit: 'text', templet: '#usernameTpl'}">用户名</th>
<!--                <th lay-data="{field:'email', width:150}">密码</th>-->
                <th lay-data="{field:'email', width:150}">邮箱</th>
                <th lay-data="{field:'sex', width:150}">性别</th>
                <th lay-data="{field:'city', width:150}">城市</th>
                <th lay-data="{field:'sign', width:150}">签名</th>
                <th lay-data="{field:'experience', width:150, sort: true, edit: 'text'}">积分</th>
                <th lay-data="{field:'ip', width:150}">IP</th>
                <th lay-data="{field:'logins', width:150}">登入次数</th>
                <th lay-data="{field:'joinTime', width:150}">加入时间</th>
                <th lay-data="{fixed: 'right', toolbar: '#barDemo', width:150, align:'center'}">操作</th>
            </tr>
            </thead>
        </table>
    </fieldset>
<form action="/authentication/logout">
    <button type="submit" class="layui-btn layui-btn-danger">退出认证</button>
</form>

<script>
    layui.use(['table'],function(){
        var table = layui.table;
    });
</script>