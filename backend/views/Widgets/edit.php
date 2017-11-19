<form class="layui-form" action="">
    <pre class="layui-code" lay-title="JavaScript" lay-skin="notepad">//代码区域
Lay.fn.event = function(modName, events, params){
  var that = this, result = null, filter = events.match(/\(.*\)$/)||[];
  var set = (events = modName + '.'+ events).replace(filter, '');
};
      </pre>
</form>
<script>
    layui.use('code', function(){

        //layui.code(); 实际使用时，执行该方法即可。而此处注释是因为修饰器在别的js中已经执行过了
    });
</script>