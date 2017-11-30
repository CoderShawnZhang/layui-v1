<div class="layui-anim layui-anim-scale">
<?php
    use app\YiiFramework2\Widgets\BlockquoteWidget\BlockquoteWidget;
    $nav = [['url'=>'/cache/file-cache','text'=>'返回 >>']];
    echo BlockquoteWidget::widget(['content'=>$nav,'separator'=>'|']);
?>
<form class="layui-form" action="">
    <div class="layui-form-item">
        <label class="layui-form-label">缓存key</label>
        <div class="layui-input-block">
            <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-form-text">
        <label class="layui-form-label">缓存value</label>
        <div class="layui-input-block">
            <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">文件深度</label>
        <div class="layui-input-block">
            <select name="city" lay-verify="required">
                <option value=""></option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">缓存依赖</label>
        <div class="layui-input-block">
            <input type="checkbox" name="like[file]" title="文件">
            <input type="checkbox" name="like[db]" title="DB">
            <input type="checkbox" name="like[expression]" title="表达式">
            <input type="checkbox" name="like[tag]" title="标签">
            <input type="checkbox" name="like[chained]" title="组合">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">禁用</label>
        <div class="layui-input-block">
            <input type="checkbox" name="close" lay-skin="switch" lay-text="YES|NO">
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
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;
        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
</script>