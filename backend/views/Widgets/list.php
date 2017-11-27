<!--  http://blog.csdn.net/donglynn/article/details/54986433   -->
<table class="layui-table layuiyii" lay-data="{height:'full-160', url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/widgets/widget-list') ;?>', page:true, id:'widgets'}" lay-filter="widgets">
    <thead>
    <tr>
        <th lay-data="{checkbox:true, fixed: true}"></th>
        <th lay-data="{field:'txtName', width:120, sort: true}">小部件名称</th>
        <th lay-data="{field:'className', width:120, sort: true}">类名</th>
        <th lay-data="{field:'params', width:120, sort: true}">小部件配置参数</th>
        <th lay-data="{field:'routeName', width:120, sort: true}">小部件路由</th>
        <th lay-data="{field:'author', width:80}">作者</th>
        <th lay-data="{field:'status', width:150}">状态</th>
        <th lay-data="{fixed: 'right', toolbar: '#barOption', width:560, align:'center'}">操作</th>
    </tr>
    </thead>
</table>
<script type="text/html" id="barOption">
    <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit" href="/widgets/edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">安装</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">卸载</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">禁用</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="show">演示</a>
</script>
<?php
echo \Layui\Widgets\Progress::widget(['percent'=>45,'barOptions'=>['class'=>'layui-bg-green ']]);
echo '<br>';
echo '<br>';
echo '<br>';
echo \yii\bootstrap\Progress::widget([ 'percent' => 70, 'barOptions' => ['class' => 'progress-bar-warning'], 'options' => ['class' => 'progress-striped']]);
?>
<script>
    layui.use(['table','layer'],function(){
        var table = layui.table;
        var active = {
            ShowTime:function(title,params){
                var that = this;
                layer.open({
                    type:2,
                    title:title+'--小部件演示',
                    area:['600px','500px'],//宽高
                    shade:0,
                    maxmin:true,
                    offset:[150,400],
                    content:"/widgets/widget-show?params="+params+"&widgetName="+title,
                    yes:function(){
                        $(that).click();
                    },
                    zIndex:layer.zIndex,
                    success:function(layero){
                        layer.setTop(layero);
                    }
                });
            }
        }
        table.on('tool(widgets)', function(obj){
            var data = obj.data;
            if(obj.event === 'show'){
                var title = data.className;
                var params = data.params;
                active.ShowTime(title,params);
            }
        });
    });
</script>
