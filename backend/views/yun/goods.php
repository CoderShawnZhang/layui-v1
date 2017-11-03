
<?php
$url = Yii::$app->urlManager->createAbsoluteUrl('/yun/json');
?>
<table class="layui-table" lay-data="{width:900, height:'full-450', url:'<?= $url ;?>', page:true, id:'test'}" lay-filter="test">
    <thead>
    <tr>
        <th lay-data="{checkbox:true, fixed: true}"></th>
        <th lay-data="{field:'id', width:80, fixed: true, sort: true}">ID</th>
        <th lay-data="{field:'username', width:120, sort: true, edit: 'text', templet: '#usernameTpl'}">用户名</th>
        <th lay-data="{field:'email', width:150}">邮箱</th>
        <th lay-data="{field:'sex', width:80}">性别</th>
        <th lay-data="{field:'city', width:100}">城市</th>
        <th lay-data="{field:'sign', width:150}">签名</th>
        <th lay-data="{field:'experience', width:80, sort: true, edit: 'text'}">积分</th>
        <th lay-data="{field:'ip', width:120}">IP</th>
        <th lay-data="{field:'logins', width:100}">登入次数</th>
        <th lay-data="{field:'joinTime', width:120}">加入时间</th>
        <th lay-data="{fixed: 'right', toolbar: '#barDemo', width:150, align:'center'}">操作</th>
    </tr>
    </thead>
</table>

<div class="layui-hide" id="barDemo">
    <a class="layui-btn layui-btn-mini" data-type="t" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
    <a class="layui-btn layui-btn-small layui-btn-mini" lay-event="detail">查看</a>
</div>

<table id="demo"></table>

<div class="layui-hide" id="barDemo">
    <a class="layui-btn layui-btn-mini" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
    <a class="layui-btn layui-btn-small layui-btn-mini" lay-event="detail">查看</a>
</div>

<div class="layui-tab layui-tab-brief" lay-filter="demo">
    <ul class="layui-tab-title">
        <li class="layui-this">演示说明</li>
        <li>日期</li>
        <li>分页</li>
        <li>上传</li>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">

            <div class="layui-carousel" id="test1">
                <div carousel-item>
                    <div><p class="layui-bg-green demo-carousel">在这里，你将以最直观的形式体验 layui！</p></div>
                    <div><p class="layui-bg-red demo-carousel">在编辑器中可以执行 layui 相关的一切代码</p></div>
                    <div><p class="layui-bg-blue demo-carousel">你也可以点击左侧导航针对性地试验我们提供的示例</p></div>
                    <div><p class="layui-bg-orange demo-carousel">如果最左侧的导航的高度超出了你的屏幕</p></div>
                    <div><p class="layui-bg-cyan demo-carousel">你可以将鼠标移入导航区域，然后滑动鼠标滚轮即可</p></div>
                </div>
            </div>
        </div>
        <div class="layui-tab-item">
            <div id="laydateDemo"></div>
        </div>
        <div class="layui-tab-item">
            <div id="pageDemo"></div>
        </div>
        <div class="layui-tab-item">
            <div class="layui-upload-drag" id="uploadDemo">
                <i class="layui-icon"></i>
                <p>点击上传，或将文件拖拽到此处</p>
            </div>
        </div>
    </div>
</div>
<blockquote class="layui-elem-quote layui-quote-nm">layui 2.0 提供强力驱动</blockquote>


<script>
    layui.use(['laydate', 'laypage', 'layer', 'table', 'carousel', 'upload', 'element'], function(){
        var laydate = layui.laydate //日期
            ,laypage = layui.laypage //分页
        layer = layui.layer //弹层
            ,table = layui.table //表格
            ,carousel = layui.carousel //轮播
            ,upload = layui.upload //上传
            ,element = layui.element; //元素操作

        table.on('tool(test)', function(obj){
            var data = obj.data;
            if(obj.event === 'edit'){
//                alert('123');
                layer.prompt({
                    formType:2,
                    value:data.username
                },function(value,index){
                    obj.update({
                       username: value
                    });
                    layer.close(index);
                });
            }
        });
        window.demoTable = table.render({
            elem:"#demo"
            ,url:'json'
//            ,data:[{"id":123,"username":222,"email":333,"sex":444,"city":555,"sign":666,"experience":77,"ip":888,"logins":999,"joinTime":123}]
            ,cols: [[ //标题栏
                {space: true, fixed: true}
                ,{checkbox: true, LAY_CHECKED: true}
                ,{field: 'id', title: 'ID', width: 80, sort: true}
                ,{field: 'username', title: '1用户名', width: 120}
                ,{field: 'email', title: '1邮箱', width: 150}
                ,{field: 'sign', title: '1签名', width: 150}
                ,{field: 'sex', title: '性别', width: 80}
                ,{field: 'city', title: '城市', width: 100}
                ,{field: 'experience', title: '积分', width: 80, sort: true}
                ,{field: 'aaa', title: 'aaa', width:150}
            ]]
            ,height:300
            ,id:'test111'
            ,skin: 'row' //表格风格
            ,even: true
            //,size: 'lg' //尺寸

            ,page: true //是否显示分页
            ,limits: [3,5,10]
            ,limit: 8 //每页默认显示的数量
            ,loading: true //请求数据时，是否显示loading
        //,id: 'test' //ID
        });

        //向世界问个好
        layer.msg('Hello World');

        //监听Tab切换
        element.on('tab(demo)', function(data){
            layer.msg('切换了：'+ this.innerHTML);
            console.log(data);
        });

        //监听工具条
        table.on('tool(demo)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data //获得当前行数据
                ,layEvent = obj.event; //获得 lay-event 对应的值
            if(layEvent === 'detail'){
                layer.msg('查看操作');
            } else if(layEvent === 'del'){
                layer.confirm('真的删除行么', function(index){
                    obj.del(); //删除对应行（tr）的DOM结构
                    layer.close(index);
                    //向服务端发送删除指令
                });
            } else if(layEvent === 'edit'){
                layer.msg('编辑操作');
            }
        });

        //执行一个轮播实例
        carousel.render({
            elem: '#test1'
            ,width: '100%' //设置容器宽度
            ,height: 200
            ,arrow: 'none' //不显示箭头
            ,anim: 'fade' //切换动画方式
        });

        //将日期直接嵌套在指定容器中
        var dateIns = laydate.render({
            elem: '#laydateDemo'
            ,position: 'static'
            ,calendar: true //是否开启公历重要节日
            ,mark: { //标记重要日子
                '0-10-14': '生日'
                ,'2017-10-26': ''
                ,'2017-10-27': ''
            }
            ,done: function(value, date, endDate){
                if(date.year == 2017 && date.month == 10 && date.date == 27){
                    dateIns.hint('明天不上班');
                }
            }
            ,change: function(value, date, endDate){
                layer.msg(value)
            }
        });

        //分页
        laypage.render({
            elem: 'pageDemo' //分页容器的id
            ,count: 100 //总页数
            ,skin: '#1E9FFF' //自定义选中色值
            //,skip: true //开启跳页
            ,jump: function(obj, first){
                if(!first){
                    layer.msg('第'+ obj.curr +'页');
                }
            }
        });

        //上传
        upload.render({
            elem: '#uploadDemo'
            ,url: '' //上传接口
            ,done: function(res){
                console.log(res)
            }
        });
    });
</script>