<fieldset class="layui-elem-field site-demo-button">
    <legend>新增菜单</legend>
    <div style="margin-top: 20px;">

        <form class="layui-form" action="/menu/add">
            <div class="layui-form-item">
                <label class="layui-form-label">菜单选择</label>
                <div class="layui-inline">
                    <select name="pid" lay-verify="">
                        <option value="0">无</option>
                        <option value="1">北京</option>
                        <option value="2">上海</option>
                        <option value="3">杭州</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">菜单名称</label>
                <div class="layui-inline">
                    <input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">菜单图标</label>
                <input type="hidden" name="icon"/>
                <button class="layui-btn layui-btn-small layui-btn-danger" data-method="setTop"><i class="layui-icon"></i></button>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">菜单路由</label>
                <div class="layui-inline">
                    <input type="text" name="route" required lay-verify="required" placeholder="请输入路由" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">开关</label>
                <div class="layui-input-block">
                    <input type="checkbox" name="is_hide" lay-skin="switch" lay-text="显示|隐藏">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
    </div>
</fieldset>
<script>
    //Demo
    layui.use(['form','layer','jquery'], function(){
        var form = layui.form;
        var $ = layui.jquery;
        var active = {
            setTop: function () {
                var that = this;
                layer.open({
                    type: 2 //此处以iframe举例
                    , title: '当你选择该窗体时，即会在最顶端'
                    , area: ['390px', '260px']
                    , shade: 0
                    , maxmin: true
                    , offset: [ //为了演示，随机坐标
                        150//Y
                        , 650//x
                    ]
//                    ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
//                    ,shade: 0.8
                    , content: '/menu/icon'
                    , btn: ['继续弹出', '全部关闭'] //只是为了演示
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
            }
        };

        $('.layui-btn').on('click', function(){
            var othis = $(this), method = othis.data('method');
            active[method] ? active[method].call(this, othis) : '';
        });
        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
</script>