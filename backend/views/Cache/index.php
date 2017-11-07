<fieldset class="layui-elem-field site-demo-button">
    <legend>缓存操作</legend>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">文本域</label>
        <div class="layui-input-block">
            <form action="/cache/writeredis" method="post">
                <textarea name="redistxt" placeholder="请输入内容" class="layui-textarea"></textarea>
                <button type="submit" class="layui-btn">写入缓存</button><?php if(count($error) > 0){ echo $error['msg']; }?>
            </form>
        </div>
    </div>
</fieldset>

<fieldset class="layui-elem-field site-demo-button">
    <legend>缓存展示区</legend>
    <div class="layui-collapse" style="margin-left: 110px;">
        <div class="layui-colla-item ">
            <h2 class="layui-colla-title">缓存值</h2>
            <div class="layui-colla-content layui-show">
               <?= isset($keys)?$keys:''; ?>
            </div>
        </div>
        <form action="/cache/readredis" method="post">
            <button type="submit" class="layui-btn layui-btn-normal">读取缓存</button>
        </form>
        <form action="/cache/delredis" method="post">
            <button type="submit" class="layui-btn layui-btn-danger">清空缓存</button>
        </form>
        <form action="/cache/showredis" method="post">
            <table class="layui-table" lay-data="{height:'full-460', url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/cache/showredis') ;?>', page:true, id:'test'}" lay-filter="test">
                <thead>
                <tr>
                    <th lay-data="{checkbox:true, fixed: true}"></th>
                    <th lay-data="{field:'id', width:80, fixed: true, sort: true}">ID</th>
                    <th lay-data="{field:'redisKey', width:500, sort: true}">RedisKey</th>
                    <th lay-data="{field:'redisValue', width:500, sort: true}">redisValue</th>
                    <th lay-data="{fixed: 'right', toolbar: '#barOption', width:240, align:'center'}">操作</th>
                </tr>
                </thead>
            </table>
            <div class="layui-hide" id="barOption">
                <a class="layui-btn layui-btn-mini" data-type="t" lay-event="read">读取缓存</a>
                <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除缓存</a>
                <a class="layui-btn layui-btn-small layui-btn-mini" lay-event="show">查看</a>
            </div>
            <button type="submit" class="layui-btn layui-btn-danger">查看所有缓存</button>
        </form>
    </div>
</fieldset>
<script>
    layui.use(['table'],function(){
       var table = layui.table;

        //监听工具条
        table.on('tool(test)',function(obj){
            var data = obj.data;
            if(obj.event === 'read'){
                console.log(data.redisKey);
            } else if(obj.event === 'del'){
                layer.confirm('确定删除吗',function (index) {
                    obj.del();
                    layer.close(index);
                });
            } else if(obj.event === 'show') {
                layer.alert('查看行:<br>'+JSON.stringify(data));
            }
        });
    });
</script>