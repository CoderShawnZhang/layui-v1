<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
    <legend>系统设置</legend>
</fieldset>
<div class="layui-row">
    <div class="layui-col-xs6">
        <div class="grid-demo grid-demo-bg1">
            <button class="layui-btn layui-btn-normal">添加设置</button>
        </div>
    </div>
    <div class="layui-col-xs6">
        <div class="grid-demo">6/12</div>
    </div>
</div>
<form class="layui-form" action="">
    <?php foreach($model as $key => $val){ ?>
        <?php if($val['name'] == 'CACHE'){?>
            <div class="layui-form-item">
                <label class="layui-form-label"><?=$val['name'];?></label>
                <div class="layui-input-inline" style="width: 70%;">
                    <input type="checkbox" checked="" name="close" lay-skin="switch"  lay-filter="switchCache" lay-text="ON|OFF">
                </div>
                <div class="layui-form-mid layui-word-aux"><?=$val['title'];?></div>
            </div>
            <?php }else{?>
            <div class="layui-form-item">
                <label class="layui-form-label"><?=$val['name'];?></label>
                <div class="layui-input-inline" style="width: 70%;">
                    <input type="text" name="password" value="<?=$val['value'];?>" lay-verify="pass" placeholder="请输入密码" autocomplete="off" class="layui-input" style="80%;">
                </div>
                <div class="layui-form-mid layui-word-aux"><?=$val['title'];?></div>
            </div>
            <?php } ?>
    <?php } ?>
</form>

<script>
    layui.use(['form'],function(){
        var form = layui.form,
            layer = layui.layer;
        form.on('switch(switchCache)',function (data) {
            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
                offset: '6px'
            });
            layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        })
    });
</script>