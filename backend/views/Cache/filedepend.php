<blockquote class="layui-elem-quote">
    <p>缓存依赖文件：backend\YiiFramework2\Cache\FileDepend\content.txt</p>
</blockquote>
<blockquote class="layui-elem-quote">
    <p>缓存值：<span id="cacheKey"><?php echo Yii::$app->cache->get('cacheFile'); ?></span></p>
</blockquote>
<div id="cacheOption">
    <button class="layui-btn" id="updateTxt">修改依赖文件</button>
    <button class="layui-btn layui-btn-normal" id="setCache">设置缓存</button>
    <button class="layui-btn layui-btn-danger" id="flushcache">冲刷缓存</button>
</div>
<script>
    layui.use(['jquery'], function() {
        $ = layui.jquery;
        active={
            updateTxt:function(){
                layui.jquery.get('/cache/filedepend?changeTxt=1',function(data){
                    layui.jquery("#cacheKey").html(data);
                });
            },
            flushcache:function(){
                layui.jquery.get('/cache/filedepend?flush=1',function(data){
                    layui.jquery("#cacheKey").html(data);
                });
            },
            setCache:function(){
                layui.jquery.get('/cache/filedepend?setcache=1',function(data){
                    layui.jquery("#cacheKey").html(data);
                });
            }
        }
        $('#cacheOption .layui-btn').on('click',function(){
            var event = $(this).attr('id');
            var that = $(this);
            active[event] ? active[event].call(this, that) : '';
        });
    });
</script>
