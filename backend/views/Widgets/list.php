<table class="layui-table layuiyii" lay-data="{height:'full-160', url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/widgets/widget-list') ;?>', page:true, id:'widgets'}" lay-filter="widgets">
    <thead>
    <tr>
        <th lay-data="{checkbox:true, fixed: true}"></th>
        <th lay-data="{field:'id', width:120, fixed: true, sort: true}">小部件ID</th>
        <th lay-data="{field:'name', width:120, sort: true}">小部件名称</th>
        <th lay-data="{field:'routeName', width:120, sort: true}">小部件路由</th>
        <th lay-data="{field:'params', width:120, sort: true}">小部件参数</th>
        <th lay-data="{field:'author', width:80}">作者</th>
        <th lay-data="{field:'status', width:150}">状态</th>
        <th lay-data="{fixed: 'right', toolbar: '#barOption', width:260, align:'center'}">操作</th>
    </tr>
    </thead>
</table>

<div class="layui-hide" id="barOption">
    <a class="layui-btn layui-btn-mini" data-type="t" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-mini" data-type="t" lay-event="install">安装</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">卸载</a>
    <a class="layui-btn layui-btn-small layui-btn-mini" lay-event="detail">禁用</a>
    <a class="layui-btn layui-btn-small layui-btn-mini" lay-event="show">演示</a>
</div>
<script>
    layui.use(['table','layer'],function(){
        var table = layui.table;
        var active = {
            ShowTime:function(title,id){
                var that = this;
                layer.open({
                    type:2,
                    title:title+'--小部件演示',
                    area:['600px','500px'],//宽高
                    shade:0,
                    maxmin:true,
                    offset:[150,400],
                    content:"/widgets/widget-show?widgetID="+id,
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
                var title = data.name;
                var id = data.id;
                active.ShowTime(title,id);
            }
        });
    });
</script>
