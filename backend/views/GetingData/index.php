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

<fieldset class="layui-elem-field site-demo-button" style="margin: 30px;width: 500px;">
    <legend>创建表单</legend>
<?php
    //如果要使用layui表单formJS组件认证，form的class必须指定为"layui-form"
    $form = ActiveForm::begin([
        'id' => 'login-form',
        'action' =>'/getingdata/postform',
        'method'=>'post',
        'options' => ['class' => 'layui-form form-horizontal'],
        'fieldConfig' => [
            'labelOptions' => ['class' => 'layui-form'],
        ],
    ])
?>
    <div class="layui-form-item">
        <label class="layui-form-label">单行输入框</label>
        <div class="layui-input-block">
            <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>
    </div>
<?= $form->field($model, 'username',
    ['template'=>'<div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">{label}：</label>
                <div class="layui-input-inline">
                    <input type="text" name="username" lay-verify="required" autocomplete="off" class="layui-input" value="">
                </div>
                <div class="layui-form-mid layui-word-aux">{label}</div>
            </div>
        </div>'])->textInput(['name'=>'username'])->hint('22222') ?>
<?= $form->field($model, 'password',['template'=>'<div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">{label}：</label>
                <div class="layui-input-inline">
                    <input type="text" name="password" lay-verify="required" autocomplete="off" class="layui-input" value="">
                </div>
                <div class="layui-form-mid layui-word-aux">{label}</div>
            </div>
        </div>'])->passwordInput(['name'=>'password']) ?>
    <?= $form->field($model, 'email',['template'=>'<div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">{label}：</label>
                <div class="layui-input-inline">
                    <input type="email" name="email" lay-verify="email" autocomplete="off" class="layui-input" value="">
                </div>
                <div class="layui-form-mid layui-word-aux">{label}</div>
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
            title: function(value){
                if(value.length < 5){
                    return '标题至少得5个字符啊';
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
            return false;
        });
    });
</script>