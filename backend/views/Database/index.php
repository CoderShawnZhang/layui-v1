
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
            <button class="layui-btn layui-btn-normal" data-method="back" data-type="t">导入sql</button>
        </div>
    </div>
</fieldset>



<table class="layui-table" lay-data="{height:'400', url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/database/table-list') ;?>', id:'datatable',loading:true}" lay-filter="datatable">
    <thead>
    <tr>
        <th lay-data="{checkbox:true, fixed: true}"></th>
        <th lay-data="{field:'Name', width:150, fixed: true, sort: true}">表名</th>
        <th lay-data="{field:'Engine', width:150, fixed: true, sort: true}">存储引擎</th>
        <th lay-data="{field:'Version', width:150, fixed: true, sort: true}">版本号</th>
        <th lay-data="{field:'Row_format', width:150, fixed: true, sort: true}">行格式</th>
        <th lay-data="{field:'Rows', width:150, fixed: true, sort: true}">行数</th>
        <th lay-data="{field:'Avg_row_length', width:150, fixed: true, sort: true}">行长度均值</th>
        <th lay-data="{field:'Data_length', width:150, fixed: true, sort: true}">表大小</th>
        <th lay-data="{field:'Max_data_length', width:150, fixed: true, sort: true}">表最大限制</th>
        <th lay-data="{field:'Index_length', width:150, fixed: true, sort: true}">索引大小</th>
        <th lay-data="{field:'Data_free', width:150, fixed: true, sort: true}">碎片大小</th>
        <th lay-data="{field:'Auto_increment', width:150, fixed: true, sort: true}">自动生成唯一标号</th>
        <th lay-data="{field:'Create_time', width:150, fixed: true, sort: true}">创建时间</th>
        <th lay-data="{field:'Update_time', width:150, fixed: true, sort: true}">更新时间</th>
        <th lay-data="{field:'Check_time', width:150, fixed: true, sort: true}">检测时间</th>
        <th lay-data="{field:'Collation', width:150, fixed: true, sort: true}">字符序规则</th>
        <th lay-data="{field:'Checksum', width:150, fixed: true, sort: true}">检测数量</th>
        <th lay-data="{field:'Checksum', width:150, fixed: true, sort: true}">检测数量</th>

        <th lay-data="{fixed: 'right', toolbar: '#barOption', width:150, align:'center'}">操作</th>
    </tr>
    </thead>
</table>
<div class="layui-hide" id="barOption">
<div class="layui-hide" id="barOption">
    <a class="layui-btn layui-btn-mini" data-type="t" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
    <a class="layui-btn layui-btn-small layui-btn-mini" lay-event="detail">查看</a>
</div>
    <button class="layui-btn" data-method="back" data-type="t">备份</button>
<script>
    layui.use(['table','layer'],function(){
        var table = layui.table,
            $ = layui.jquery,
            layer = layui.layer;
        table.render({ //其它参数在此省略
            loading: true
        });
        var active = {
            back:function(othis){
                var type = othis.data('type')
                    ,action = othis.data('method')
                    ,text = othis.text();
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

            }
        };

        $('#layerDemo .layui-btn').on('click', function(){
            var othis = $(this), method = othis.data('method');
            active[method] ? active[method].call(this, othis) : '';
        });
    });
</script>
