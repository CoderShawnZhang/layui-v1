<blockquote class="layui-elem-quote">
    文件缓存
</blockquote>
<div style="margin-left: 20px;">
    <button class="layui-btn"><a href="/cache/file-cache">创建文件缓存</a></button>
</div>

<table class="layui-hide" id="filecache"></table>

<script type="text/html" id="barOption">
    <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit" href="/cache/edit-file-cache">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="show">演示</a>
</script>
<script>
    layui.use(['table','layer'],function(){
        var table = layui.table;
        table.render({
            loading: true
            ,elem: '#filecache'
            ,url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/cache/get-file-cache-file') ;?>'
            ,cols: [[
                {type:'numbers'}
                ,{type: 'checkbox'}
                ,{field:'filecache', title:'缓存文件名', width:500,  sort: true}
                ,{fixed: 'right', toolbar: '#barOption', width:200, align:'center'}
            ]]
            ,even: true
            ,page: true
            ,limit:10
            ,limits:[5,10,15,20]
        });
    });
</script>