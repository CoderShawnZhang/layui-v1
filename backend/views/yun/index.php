



<div class="layui-collapse">
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">创建导航信息</h2>
        <div class="layui-colla-content">
            <form class="layui-form" action="">
                <div class="layui-form-item">
                    <label class="layui-form-label">输入框</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">密码框</label>
                    <div class="layui-input-inline">
                        <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">辅助文字</div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">选择框</label>
                    <div class="layui-input-block">
                        <select name="city" lay-verify="required">
                            <option value=""></option>
                            <option value="0">北京</option>
                            <option value="1">上海</option>
                            <option value="2">广州</option>
                            <option value="3">深圳</option>
                            <option value="4">杭州</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">复选框</label>
                    <div class="layui-input-block">
                        <input type="checkbox" name="like[write]" title="写作">
                        <input type="checkbox" name="like[read]" title="阅读" checked>
                        <input type="checkbox" name="like[dai]" title="发呆">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">开关</label>
                    <div class="layui-input-block">
                        <input type="checkbox" name="switch" lay-skin="switch">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">单选框</label>
                    <div class="layui-input-block">
                        <input type="radio" name="sex" value="男" title="男">
                        <input type="radio" name="sex" value="女" title="女" checked>
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">文本域</label>
                    <div class="layui-input-block">
                        <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
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
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">创建导航样式</h2>
        <div class="layui-colla-content">
            <table class="layui-table">
                <colgroup>
                    <col width="150">
                    <col width="200">
                    <col>
                </colgroup>
                <thead>
                <tr>
                    <th>昵称</th>
                    <th>加入时间</th>
                    <th>签名</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>贤心</td>
                    <td>2016-11-29</td>
                    <td>人生就像是一场修行</td>
                </tr>
                <tr>
                    <td>许闲心</td>
                    <td>2016-11-28</td>
                    <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
                </tr>
                <tr>
                    <td>张二</td>
                    <td>1987-06-21</td>
                    <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
                </tr>
                <tr>
                    <td>许小燕</td>
                    <td>2016-11-28</td>
                    <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
                </tr>
                <tr>
                    <td>哈哈哈哈</td>
                    <td>2016-11-28</td>
                    <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">创建导航链接</h2>
        <div class="layui-colla-content">

            <ul class="layui-timeline">
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月18日</h3>
                        <p>
                            layui 2.0 的一切准备工作似乎都已到位。发布之弦，一触即发。
                            <br>不枉近百个日日夜夜与之为伴。因小而大，因弱而强。
                            <br>无论它能走多远，抑或如何支撑？至少我曾倾注全心，无怨无悔 <i class="layui-icon"></i>
                        </p>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月16日</h3>
                        <p>杜甫的思想核心是儒家的仁政思想，他有“<em>致君尧舜上，再使风俗淳</em>”的宏伟抱负。个人最爱的名篇有：</p>
                        <ul>
                            <li>《登高》</li>
                            <li>《茅屋为秋风所破歌》</li>
                        </ul>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月15日</h3>
                        <p>
                            中国人民抗日战争胜利72周年
                            <br>常常在想，尽管对这个国家有这样那样的抱怨，但我们的确生在了最好的时代
                            <br>铭记、感恩
                            <br>所有为中华民族浴血奋战的英雄将士
                            <br>永垂不朽
                        </p>
                    </div>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月15日</h3>
                        <p>
                            中国人民抗日战争胜利72周年
                            <br>常常在想，尽管对这个国家有这样那样的抱怨，但我们的确生在了最好的时代
                            <br>铭记、感恩
                            <br>所有为中华民族浴血奋战的英雄将士
                            <br>永垂不朽
                        </p>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月15日</h3>
                        <p>
                            中国人民抗日战争胜利72周年
                            <br>常常在想，尽管对这个国家有这样那样的抱怨，但我们的确生在了最好的时代
                            <br>铭记、感恩
                            <br>所有为中华民族浴血奋战的英雄将士
                            <br>永垂不朽
                        </p>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月15日</h3>
                        <p>
                            中国人民抗日战争胜利72周年
                            <br>常常在想，尽管对这个国家有这样那样的抱怨，但我们的确生在了最好的时代
                            <br>铭记、感恩
                            <br>所有为中华民族浴血奋战的英雄将士
                            <br>永垂不朽
                        </p>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">8月15日</h3>
                        <p>
                            中国人民抗日战争胜利72周年
                            <br>常常在想，尽管对这个国家有这样那样的抱怨，但我们的确生在了最好的时代
                            <br>铭记、感恩
                            <br>所有为中华民族浴血奋战的英雄将士
                            <br>永垂不朽
                        </p>
                    </div>
                </li>
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                    <div class="layui-timeline-content layui-text">
                        <div class="layui-timeline-title">过去</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">创建导航链接</h2>
        <div class="layui-colla-content">

            <table id="demo"></table>

        </div>
    </div>
</div>
<script>
    //Demo
    layui.use(['form','element','table'], function(){
        var form = layui.form;
        var element = layui.element;
        var table = layui.table;
        //执行渲染


        //方法级渲染
        window.demoTable = table.render({
            elem: '#demo'
            //,url: 'json/table/demo1.json'
            ,data: [{
                "id": "11"
                ,"username": "111杜甫"
                ,"email": "xianxin@layui.com"
                ,"sex": "男"
                ,"city": "浙江杭州"
                ,"sign": "人生恰似一场修行"
                ,"experience": "116"
                ,"ip": "192.168.0.8"
                ,"logins": "108"
                ,"joinTime": "2016-10-14"
            }, {
                "id": "10002"
                ,"username": "李白"
                ,"email": "xianxin@layui.com"
                ,"sex": "男"
                ,"city": "浙江杭州"
                ,"sign": "人生恰似一场修行"
                ,"experience": "12"
                ,"ip": "192.168.0.8"
                ,"logins": "106"
                ,"joinTime": "2016-10-14"
                ,"LAY_CHECKED": true
            }, {
                "id": "10003"
                ,"username": "王勃"
                ,"email": "xianxin@layui.com"
                ,"sex": "男"
                ,"city": "浙江杭州"
                ,"sign": "人生恰似一场修行"
                ,"experience": "65"
                ,"ip": "192.168.0.8"
                ,"logins": "106"
                ,"joinTime": "2016-10-14"
            }, {
                "id": "10004"
                ,"username": "贤心"
                ,"email": "xianxin@layui.com"
                ,"sex": "男"
                ,"city": "浙江杭州"
                ,"sign": "人生恰似一场修行"
                ,"experience": "666"
                ,"ip": "192.168.0.8"
                ,"logins": "106"
                ,"joinTime": "2016-10-14"
            }, {
                "id": "10005"
                ,"username": "贤心"
                ,"email": "xianxin@layui.com"
                ,"sex": "男"
                ,"city": "浙江杭州"
                ,"sign": "人生恰似一场修行"
                ,"experience": "86"
                ,"ip": "192.168.0.8"
                ,"logins": "106"
                ,"joinTime": "2016-10-14"
            }, {
                "id": "10006"
                ,"username": "贤心"
                ,"email": "xianxin@layui.com"
                ,"sex": "男"
                ,"city": "浙江杭州"
                ,"sign": "人生恰似一场修行"
                ,"experience": "12"
                ,"ip": "192.168.0.8"
                ,"logins": "106"
                ,"joinTime": "2016-10-14"
            }, {
                "id": "10007"
                ,"username": "贤心"
                ,"email": "xianxin@layui.com"
                ,"sex": "男"
                ,"city": "浙江杭州"
                ,"sign": "人生恰似一场修行"
                ,"experience": "16"
                ,"ip": "192.168.0.8"
                ,"logins": "106"
                ,"joinTime": "2016-10-14"
            }, {
                "id": "10008"
                ,"username": "贤心1"
                ,"email": "xianxin@layui.com"
                ,"sex": "男"
                ,"city": "浙江杭州"
                ,"sign": "人生恰似一场修行"
                ,"experience": "106"
                ,"ip": "192.168.0.8"
                ,"logins": "106"
                ,"joinTime": "2016-10-14"
            }, {
                "id": "10008"
                ,"username": "222"
                ,"email": "xianxin@layui.com"
                ,"sex": "男"
                ,"city": "浙江杭州"
                ,"sign": "人生恰似一场修行"
                ,"experience": "106"
                ,"ip": "192.168.0.8"
                ,"logins": "106"
                ,"joinTime": "2016-10-14"
            }]
            //,height: 274
            ,cols: [[ //标题栏
                {space: true, fixed: true}
                ,{checkbox: true, LAY_CHECKED: true}
                ,{field: 'id', title: 'ID', width: 80, sort: true}
                ,{field: 'username', title: '用户名', width: 120}
                ,{field: 'email', title: '邮箱', width: 150}
                ,{field: 'sign', title: '签名', width: 150}
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


        //转换静态表格
        table.init('demo', {
            height: 315 //设置高度
            //支持所有基础参数
        });

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
</script>
