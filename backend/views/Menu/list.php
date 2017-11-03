<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2017/11/3
 * Time: 下午6:02
 */
?>
<div class="layui-hide" id="barOption">
    <a class="layui-btn layui-btn-mini" data-type="t" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
    <a class="layui-btn layui-btn-small layui-btn-mini" lay-event="detail">查看</a>
</div>

<table id="demo"></table>
<script>
    layui.use(['table'],function(){
       var table = layui.table;
        window.demoTable = table.render({
            elem:"#demo"
            ,url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/yun/json') ;?>'
//            ,data:[{"id":1,"username":222,"email":333,"sex":444,"city":555,"sign":666,"experience":77,"ip":888,"logins":999,"joinTime":123},{"id":2,"username":222,"email":333,"sex":444,"city":555,"sign":666,"experience":77,"ip":888,"logins":999,"joinTime":123},{"id":3,"username":222,"email":333,"sex":444,"city":555,"sign":666,"experience":77,"ip":888,"logins":999,"joinTime":123},{"id":4,"username":222,"email":333,"sex":444,"city":555,"sign":666,"experience":77,"ip":888,"logins":999,"joinTime":123},{"id":5,"username":222,"email":333,"sex":444,"city":555,"sign":666,"experience":77,"ip":888,"logins":999,"joinTime":123},{"id":6,"username":222,"email":333,"sex":444,"city":555,"sign":666,"experience":77,"ip":888,"logins":999,"joinTime":123},{"id":7,"username":222,"email":333,"sex":444,"city":555,"sign":666,"experience":77,"ip":888,"logins":999,"joinTime":123},{"id":8,"username":222,"email":333,"sex":444,"city":555,"sign":666,"experience":77,"ip":888,"logins":999,"joinTime":123},{"id":9,"username":222,"email":333,"sex":444,"city":555,"sign":666,"experience":77,"ip":888,"logins":999,"joinTime":123},{"id":10,"username":222,"email":333,"sex":444,"city":555,"sign":666,"experience":77,"ip":888,"logins":999,"joinTime":123}]
            ,cols: [[ //标题栏
            {checkbox: true, LAY_CHECKED: true} //默认全选
            ,{field: 'id', title: 'ID', width: 80, sort: true}
            ,{field: 'username', title: '用户名', width: 120}
            ,{field: 'email', title: '邮箱', width: 150}
            ,{field: 'sign', title: '签名', width: 150}
            ,{field: 'sex', title: '性别', width: 80}
            ,{field: 'city', title: '城市', width: 100}
            ,{field: 'experience', title: '积分', width: 80, sort: true}
        ]]
            ,cols: [[ //标题栏
                {space: true, fixed: true}
                ,{checkbox: true, LAY_CHECKED: true}
                ,{field: 'id', title: 'ID', width: 80, sort: true}
                ,{field: 'username', title: '用户名', width: 120}
                ,{field: 'email', title: '邮箱', width: 150}
                ,{field: 'sex', title: '性别', width: 150}
                ,{field: 'city', title: '城市', width: 100}
                ,{field: 'sign', title: '签名', width: 150}
                ,{field: 'experience', title: '积分', width: 80, sort: true}
                ,{field: 'ip', title: 'IP', width: 80, sort: true}
                ,{field: 'logins', title: '登入次数', width: 80, sort: true}
                ,{field: 'joinTime', title: '加入时间', width: 80, sort: true}
                ,{field: 'aaa', title: 'aaa', width:150}
            ]]
            ,height:270
            ,skin: 'row' //表格风格
            ,even: true
            ,page: true //是否显示分页
            ,limits: [5, 10, 15]
            ,limit: 5 //每页默认显示的数量
        });
    });
</script>
