<fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
    <legend>缓存</legend>
    <?php
        echo Yii::$app->cache->get('test');
    ?>
</fieldset>
<div class="layui-tab" lay-filter="cache">
    <ul class="layui-tab-title">
        <li class="layui-this">数据缓存</li>
        <li id="flagCache">片段缓存</li>
        <li>页面缓存</li>
        <li>HTTP 缓存</li>

    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <table class="layui-table" lay-data="{height:332, url:'/cache/cache-depend', id:'idTest'}" lay-filter="cache">
                <thead>
                <tr>
                    <th lay-data="{type:'checkbox', fixed: 'left'}"></th>
                    <th lay-data="{field:'id', width:50, sort: true, fixed: true}">ID</th>
                    <th lay-data="{field:'event', width:220}">缓存操作</th>
                    <th lay-data="{field:'key', width:220, sort: true}">缓存key</th>
                    <th lay-data="{field:'value', width:220}">缓存value</th>
                    <th lay-data="{field:'depend', width:220}">缓存依赖</th>
                    <th lay-data="{fixed: 'right', width:178, align:'center', toolbar: '#barDemo'}"></th>
                </tr>
                </thead>
            </table>

            <script type="text/html" id="barDemo">
                <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="show">演示</a>
            </script>

        </div>
        <div class="layui-tab-item">
            <?php if($this->beginCache($fragCache, ['variations' => Yii::$app->params['language']])) {?>
                <span class="layui-badge"><?= time(); ?></span>
            <?php $this->endCache();} ?>
        </div>
        <div class="layui-tab-item">内容3</div>
        <div class="layui-tab-item">内容4</div>
    </div>
</div>
<script>
    layui.use(['table','jquery','element'], function(){
        var table = layui.table,$ = layui.jquery,element=layui.element;
        //触发事件
        var active = {
            show: function () {
                var that = this;
                //多窗口模式，层叠置顶
                layer.open({
                    type: 2 //此处以iframe举例
                    , title: '演示缓存操作'
                    , area:['600px','500px']
                    , shade: 0
                    , maxmin: true
                    , offset:[150,400]
                    , content: '/cache/filedepend'
                    , btn: [] //只是为了演示
                    , yes: function () {
                        $(that).click();
                    }
                    , btn2: function () {
                        layer.closeAll();
                    }
                    , zIndex: layer.zIndex //重点1
                    , success: function (layero) {
                        layer.setTop(layero); //重点2
                    }
                });
            },
            flagCache:function(_this,that){
                $.get('/cache/flag-cache?cacheKey=',function(){
                    element.tabChange('cache',$(_this).attr('id'));
                });
            }
        };

        //监听选项卡切换事件
        element.on('tab(cache)', function(){
            var that = $(this);
            active[that.attr('id')]?active[that.attr('id')].call(this,that):'';
        });
        //监听工具条
        table.on('tool(cache)', function(obj){
            var data = obj.data;
            if(obj.event === 'show'){
                active.show();
            } else if(obj.event === 'del'){
                layer.confirm('真的删除行么', function(index){
                    obj.del();
                    layer.close(index);
                });
            } else if(obj.event === 'edit'){
                layer.alert('编辑行：<br>'+ JSON.stringify(data))
            }
        });

    });
</script>