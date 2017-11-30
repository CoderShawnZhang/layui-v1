<blockquote class="layui-elem-quote">
    文件缓存
</blockquote>
<div style="margin-left: 20px;">
    <button class="layui-btn"><a href="/cache/create-file-cache">创建文件缓存</a></button>
</div>

<table class="layui-hide" id="filecache" lay-filter="filecache"></table>

<script type="text/html" id="barOption">
    <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="touch">touch</a>
</script>
<script type="text/html" id="sexTpl">
    <span style="color: #F581B1;" class="cachetime">{{ d.cachetime }}</span>
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
                ,{field:'fileupdate', title:'缓存写入时间', width:500,  sort: true}
                ,{field:'cachetime', title:'缓存倒计时', width:500,  sort: true, templet: '#sexTpl'}
                ,{fixed: 'right', toolbar: '#barOption', width:200, align:'center'}
            ]]
            ,even: true
            ,page: true
            ,limit:10
            ,limits:[5,10,15,20]
        });
        window.setInterval(function(){
            var time = $('.cachetime').each(function(){
                if($(this).html()==0){
                    $(this).html('过期');
                }
                if($(this).html()!='过期'){
                    $(this).html($(this).html()-1);
                }
            });
        },1000)
        //监听工具条
        table.on('tool(filecache)', function(obj){
            var data = obj.data;
            if(obj.event === 'detail'){
                layer.msg('ID：'+ data.id + ' 的查看操作');
            } else if(obj.event === 'touch'){
                layer.open({
                    type: 1
                    ,offset: 'auto' //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
                    ,id: 'layerauto' //防止重复弹出
                    ,content: '<div style="padding: 20px 50px;"> <input type="text" id="touchTime" lay-verify="required" placeholder="请输入秒数" autocomplete="off" class="layui-input"></div>'
                    ,btn: '确定'
                    ,btnAlign: 'c' //按钮居中
                    ,shade: 0 //不显示遮罩
                    ,yes: function(){
                        var touchTime = $("#touchTime").val();
                        $.get('/cache/cache-touch?key='+data.filecache+'&time='+touchTime,function(res){
                            obj.update({
                                cachetime: touchTime
                            });
                        });
                        layer.closeAll();
                    }
                });
            } else if(obj.event === 'edit'){
                obj.update({
                    filecache: '123'
                });
                window.location.href="/cache/edit-file-cache?key="+data.filecache;
            }
        });
    });
</script>