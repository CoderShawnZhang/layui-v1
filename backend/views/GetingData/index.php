<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2017/11/12
 * Time: 上午10:25
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<fieldset class="layui-elem-field site-demo-button">
    <legend>创建表单</legend>
    <?php
    //如果要使用layui表单formJS组件认证，form的class必须指定为"layui-form"
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'action' => '/getingdata/postform',
        'method'=>'post',
        'options' => ['class' => 'form-horizontal layui-form'],
    ])
    ?>
    <input type="text" name="mobile" style="display:none">
    <?= $form->field($model, 'searchConfig', ['template'=>'<div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">{label}：</label>
                <div class="layui-input-inline">
                    {input}
                </div>
                <div class="layui-form-mid layui-word-aux">{error}</div>
            </div>
        </div>'])->textInput(['name'=>'searchConfig','lay-verify'=>'required','autocomplete'=>'off','class'=>'layui-input']) ?>

    <?= $form->field($model, 'name', ['template'=>'<div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">{label}：</label>
                <div class="layui-input-inline">
                    {input}
                </div>
                <div class="layui-form-mid layui-word-aux">{error}</div>
            </div>
        </div>'])->textInput(['name'=>'name','lay-verify'=>'required','autocomplete'=>'off','class'=>'layui-input']) ?>
    <?= $form->field($model, 'mobile', ['template'=>'<div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">{label}：</label>
                <div class="layui-input-inline">
                    {input}
                </div>
                <div class="layui-form-mid layui-word-aux">{error}</div>
            </div>
        </div>'])->textInput(['name'=>'mobile','lay-verify'=>'name','autocomplete'=>'off','class'=>'layui-input']) ?>

    <?= $form->field($model, 'password',['template'=>'<div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">{label}：</label>
                <div class="layui-input-inline">
                {input}
                </div>
                <div class="layui-form-mid layui-word-aux">{error}</div>
            </div>
        </div>'])->passwordInput(['name'=>'password','lay-verify'=>'required','autocomplete'=>'off','class'=>'layui-input']) ?>

    <?= $form->field($model, 'email',['template'=>'<div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">{label}：</label>
                <div class="layui-input-inline">
                    <input type="email" name="email" lay-verify="email" autocomplete="off" class="layui-input" value="">
                </div>
                <div class="layui-form-mid layui-word-aux">{error}</div>
            </div>
        </div>'])->input('email') ?>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
    <?php ActiveForm::end() ?>

</fieldset>


<script>
    layui.use(['form'],function(){
        var form = layui.form
            ,layer = layui.layer;
        //自定义验证规则
        form.verify({
            name: function(value){
                if(value.length !=11){
                    return '用户名只能填写11位手机号';
                }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,content: function(value){
//                layedit.sync(editIndex);
            }
        });

//监听提交
        form.on('submit(demo1)', function(data) {
            layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            })
//            return false;
        });
    });
</script>