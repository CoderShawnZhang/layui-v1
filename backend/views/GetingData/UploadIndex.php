
<table class="layui-table" lay-data="{height:'260', url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/getingdata/image-list') ;?>', page:true, id:'test'}" lay-filter="test">
    <thead>
    <tr>
        <th lay-data="{checkbox:true, fixed: true}"></th>
        <th lay-data="{field:'id', width:80, fixed: true, sort: true}">ID</th>
        <th lay-data="{field:'src', width:120, sort: true}">图片</th>
        <th lay-data="{fixed: 'right', toolbar: '#barOption', width:150, align:'center'}">操作</th>
    </tr>
    </thead>
</table>
<div class="layui-hide" id="barOption">
    <a class="layui-btn layui-btn-mini" data-type="t" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
    <a class="layui-btn layui-btn-small layui-btn-mini" lay-event="detail">查看</a>
</div>

<div class="layui-upload">
    <form class="layui-form" action="">
        <div class="layui-input-inline" style="width: 100px;">
            <button type="button" class="layui-btn" id="test1">上传图片</button>
        </div>
        <div class="layui-input-inline">
            <input type="checkbox" checked="" name="open" lay-skin="switch" lay-filter="switchTest" lay-text="多|单">
        </div>
    </form>
    <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
        预览图：
        <div class="layui-upload-list" id="demo2"></div>
    </blockquote>
</div>

<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['action'=>'/getingdata/uploads','options' => ['enctype' => 'multipart/form-data']]) ?>
<?= $form->field($models, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*','style'=>'display:none;','id'=>'uploadimages'])->label('') ?>
    <button type="button" class="layui-btn" id="test4">选择图片</button>
    <button type="submit" class="layui-btn" id="test2">多图片上传</button>
<?php ActiveForm::end() ?>

<script>
    var imagesCheck= true;
    layui.use(['upload','table','jquery','form'], function() {
        var $ = layui.jquery
            ,table = layui.table
            ,$ = layui.jquery
            ,form = layui.form
            ,upload = layui.upload;
        $("#test4").on('click',function(){
            $("#uploadimages").trigger('click');
        });
        //监听指定开关
        form.on('switch(switchTest)', function(data){
//            layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
//                offset: '6px'
//            });
            if(this.checked){
                imagesCheck = true;
                document.getElementById("imageFile").multiple=true;
                layer.tips('温馨提示：您开启了允许多图上传！', data.othis)
            }else{
                imagesCheck = false;
                document.getElementById("imageFile").multiple=false;
                layer.tips('温馨提示：您关闭了多图上传，只允许上传单张图片！', data.othis)
            }
            uploadInst.upload();
        });
        //普通图片上传
        var uploadInst = upload.render({
              elem: '#test1'
            , id:'imageFile'
            , multiple: imagesCheck  //指定多张图片
            , field:'UploadForm[imageFile]'
            , data:{file:$("input[name='UploadForm[imageFile]']")}
            , url: '/getingdata/upload'
            , before: function (obj) {
                //预读本地文件示例，不支持ie8
                obj.preview(function (index, file, result) {
                    $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
//                    $('#demo1').attr('src', result); //图片链接（base64）
                });
            }
            , done: function (res) {
                //如果上传失败
                if (res.code > 0) {
                    return layer.msg('上传失败');
                }
                //上传成功
            }
            , error: function () {
                //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function () {
                    uploadInst.upload();
                });
            }
        });
    });
</script>