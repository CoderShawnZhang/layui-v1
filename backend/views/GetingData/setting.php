
<fieldset class="layui-elem-field site-demo-button" style="width: 100%;">
    <legend>菜单操作</legend>
    <div style="margin: 15px;">
        <div class="layui-input-inline">
            <input type="tel" name="phone" lay-verify="phone" autocomplete="off" class="layui-input" placeholder="查询配置">
        </div>
        <button class="layui-btn layui-btn-warm">查询</button>
        <button class="layui-btn"><a href="/getingdata/add">新增配置</a></button>
        <button class="layui-btn layui-btn-danger">禁用选中</button>
    </div>
</fieldset>

<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;width: 100%;">
    <legend>系统设置</legend>
</fieldset>
<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
?>
<? Pjax::begin()?>
<?=Html::a('time',['/getingdata/time'],['class'=>'btn btn-lg btn-primary'])?>
<h3>Current Time:<?=$time?></h3>
<? Pjax::end()?>
<form class="layui-form" action="/getingdata/setting-update" method="post" data-pjax="1">
    <?php foreach($model as $key => $val){ ?>
        <?php if($val['name'] == 'CACHE'){?>
            <div class="layui-form-item">
                <label class="layui-form-label"><?=$val['name'];?></label>
                <div class="layui-input-inline" style="width: 70%;">
                    <input type="checkbox" checked="" name="Setting[<?=$val['name'];?>][value]" lay-skin="switch"  lay-filter="switchCache" lay-text="ON|OFF">
                </div>
                <div class="layui-form-mid layui-word-aux"><?=$val['title'];?></div>
            </div>
            <?php }else{?>
            <div class="layui-form-item">
                <label class="layui-form-label"><?=$val['name'];?></label>
                <div class="layui-input-inline" style="width: 70%;">
                    <input type="text" name="Setting[<?=$val['name'];?>][value]" value="<?=$val['value'];?>" lay-verify="pass" placeholder="请输入密码" autocomplete="off" class="layui-input" style="80%;">
                </div>
                <div class="layui-form-mid layui-word-aux"><?=$val['title'];?></div>
            </div>
            <?php } ?>
    <?php } ?>
    <div class="layui-form-item">
        <label class="layui-form-label"></label>
        <div class="layui-input-inline" style="width: 70%;position: relative;">
            <button class="layui-btn layui-btn-warm" style="position: absolute;right: 0;">更新</button>
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>
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