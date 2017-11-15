
<fieldset class="layui-elem-field site-demo-button" style="width: 100%;">
    <legend>菜单操作</legend>
    <div style="margin: 15px;" id="layerDemo">
        <div class="layui-input-inline">
            <input type="tel" name="phone" lay-verify="phone" autocomplete="off" class="layui-input" placeholder="查询配置">
        </div>
        <button class="layui-btn layui-btn-warm">查询</button>
        <div style="float:right;margin-left: 10px;margin-right: 20px;">
            <button class="layui-btn" data-method="back" data-type="t">备份</button>
        </div>
        <div style="float:right;margin-left: 10px;">
            <button class="layui-btn layui-btn-normal" data-method="export" data-type="t">导入sql</button>
        </div>
    </div>
</fieldset>


<table class="layui-hide" id="datatable"></table>

<script type="text/html" id="checkboxTpl">
    <input type="checkbox" name="" title="锁定" {{ d.id == 10006 ? 'checked' : '' }}>
</script>
<script type="text/html" id="switchTpl">
    <input type="checkbox" name="yyy" lay-skin="switch" lay-text="YES|NO" {{ d.id == 10003 ? 'checked' : '' }}>
</script>
<script type="text/html" id="barOption">
    <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>

<script>
layui.use(['table','layer'],function(){
        var table = layui.table,
            $ = layui.jquery,
            layer = layui.layer;

        table.render({
            loading: true
            ,elem: '#datatable'
            ,url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/database/table-list') ;?>'
            ,cols: [[
                {type:'numbers'}
                ,{type: 'checkbox'}
                ,{field:'Name', title:'表名', width:100, unresize: true, sort: true}
                ,{field:'Engine', title:'存储引擎', width:100, templet: '#usernameTpl'}
                ,{field:'Version', title:'版本号', width:100}
                ,{field:'Row_format', title:'行格式', width:100}
                ,{field:'Rows', title:'行数', width:100}
                ,{field:'Avg_row_length', title:'行长度均值', width:100}
                ,{field:'Data_length', title:'表大小', width:100}
                ,{field:'Max_data_length', title:'表最大限制', width:100}
                ,{field:'Index_length', title:'索引大小', width:100}
                ,{field:'Data_free', title:'碎片大小', width:100}
                ,{field:'Auto_increment', title:'自动生成唯一标号', width:100}
                ,{field:'Create_time', title:'创建时间', width:150}
                ,{field:'Update_time', title:'更新时间', width:150}
                ,{field:'Check_time', title:'检测时间', width:100}
                ,{field:'Collation', title:'字符序规则', width:150}
                ,{field:'Checksum', title: '检测数量', sort: true, width:100}
                ,{field:'option', title:'操作', width:85, templet: '#switchTpl'}
                ,{field:'lock', title:'是否锁定', width:110, templet: '#checkboxTpl'}
                ,{fixed: 'right', toolbar: '#barOption', width:200, align:'center'}
            ]]
            ,page: true
        });
        var active = {
            back:function(othis){
                var type = othis.data('type')
                    ,action = othis.data('method');

                $.get('/database/'+action,function(data){
                    layer.open({
                        type: 1
                        ,offset: type //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
                        ,id: 'layerDemo'+type //防止重复弹出
                        ,content: data
                        ,btn: '确定'
                        ,btnAlign: 'c' //按钮居中
                        ,shade: 0 //不显示遮罩
                        ,yes: function(){
                            layer.closeAll();
                        }
                    });
                });

            },
            export:function(othis){
                var type = othis.data('type')
                    ,action = othis.data('method');
                    layer.open({
                        type: 1
                        ,offset: type //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
                        ,id: 'layerDemo'+type //防止重复弹出
                        ,content: 12313123
                        ,btn: '确定'
                        ,btnAlign: 'c' //按钮居中
                        ,shade: 0 //不显示遮罩
                        ,yes: function(){
                            layer.closeAll();
                        }
                    });

            }
        };
        $('#layerDemo .layui-btn').on('click', function(){
            var othis = $(this), method = othis.data('method');
            active[method] ? active[method].call(this, othis) : '';
        });
    });
</script>
