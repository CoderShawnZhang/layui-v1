<?php
    use yii\bootstrap\Progress;
    use app\YiiFramework2\Widgets\ProgressWidget\ProgressWidget;
    use yii\bootstrap\Alert;
?>

<?= \yii\widgets\Menu::widget() ?>


<?= Progress::widget([
    'percent' => 30,
    'label' => 'Progress 30%',
    'barOptions' => ['class' => 'progress-bar-success'],
]) ?>

<?= ProgressWidget::widget(['percent'=>80,'showpercent'=>true,'label'=>'2312321312','options'=>['class'=>'progress-striped'],'barOptions'=>['class'=>'progress-striped']])?>

<div class="site-demo-button" style="margin-top: 20px; margin-bottom: 0;">
    <button class="layui-btn site-demo-active" data-type="loading">模拟loading</button>
</div>

<?php

echo Alert::widget([
    'options' => [
        'class' => 'alert-danger',
    ],
    'body' => '123213123123',
]);
?>
<script>
    layui.use('element', function(){
        var $ = layui.jquery
            ,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块

        //触发事件
        var active = {
            setPercent: function(){
                //设置50%进度
                element.progress('demo', '50%')
            }
            ,loading: function(othis){
                var DISABLED = 'layui-btn-disabled';
                if(othis.hasClass(DISABLED)) return;

                //模拟loading
                var n = 0, timer = setInterval(function(){
                    n = n + Math.random()*10|0;
                    if(n>100){
                        n = 100;
                        clearInterval(timer);
                        othis.removeClass(DISABLED);
                    }
                    element.progress('demo', n+'%');
                }, 300+Math.random()*1000);

                othis.addClass(DISABLED);
            }
        };

        $('.site-demo-active').on('click', function(){
            var othis = $(this), type = $(this).data('type');
            active[type] ? active[type].call(this, othis) : '';
        });
    });
</script>