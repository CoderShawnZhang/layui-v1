<form action="/database/ssss" method="post">
    <input type="text" id="te" value=""/>
    <button type="submit">提交</button>
</form>

<script>
    layui.use(['jquery'],function(){
        $ = layui.jquery;
        $("#te").on('change',function(){
           $.get('/database/gettime',function(data){
              alert(data);
           });
        });
    });

</script>