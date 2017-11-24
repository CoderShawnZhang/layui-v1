
<fieldset class="layui-elem-field site-demo-button" style="margin: 30px;width: 500px;">
    <legend>认证（Authentication）</legend>
    <form id="login_form" class="layui-form" method="post" action="/authentication/login">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken() ?>">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">认证名：</label>
                <div class="layui-input-inline">
                    <input type="text" name="mobile" lay-verify="required" autocomplete="off" class="layui-input" value="admin">
                </div>
                <div class="layui-form-mid layui-word-aux">认证名是，手机号或邮箱</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密&nbsp&nbsp&nbsp码：</label>
            <div class="layui-input-inline">
                <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input" value="123456">
            </div>
            <div class="layui-form-mid layui-word-aux">密码必须以大写字母开头</div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo" id="Login">立即认证</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
        <a id="Logina"></a>
    </form>
</fieldset>

<!-- 天气信息 -->
<div class="weather" pc style="background: black;">
    <div id="tp-weather-widget"></div>
    <script>(function(T,h,i,n,k,P,a,g,e){g=function(){P=h.createElement(i);a=h.getElementsByTagName(i)[0];P.src=k;P.charset="utf-8";P.async=1;a.parentNode.insertBefore(P,a)};T["ThinkPageWeatherWidgetObject"]=n;T[n]||(T[n]=function(){(T[n].q=T[n].q||[]).push(arguments)});T[n].l=+new Date();if(T.attachEvent){T.attachEvent("onload",g)}else{T.addEventListener("load",g,false)}}(window,document,"script","tpwidget","//widget.seniverse.com/widget/chameleon.js"))</script>
    <script>tpwidget("init", {
            "flavor": "slim",
            "location": "WX4FBXXFKE4F",
            "geolocation": "enabled",
            "language": "zh-chs",
            "unit": "c",
            "theme": "chameleon",
            "container": "tp-weather-widget",
            "bubble": "disabled",
            "alarmType": "badge",
            "color": "#FFFFFF",
            "uid": "U9EC08A15F",
            "hash": "039da28f5581f4bcb5c799fb4cdfb673"
        });
        tpwidget("show");</script>
</div>