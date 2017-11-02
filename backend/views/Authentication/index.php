<fieldset class="layui-elem-field site-demo-button" style="margin: 30px;width: 500px;">
    <legend>认证（Authentication）</legend>
    <form class="layui-form" method="post" action="/authentication/login">
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">认证名：</label>
                <div class="layui-input-inline">
                    <input type="text" name="username" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">认证名是，手机号或邮箱</div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密&nbsp&nbsp&nbsp码：</label>
            <div class="layui-input-inline">
                <input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">密码必须以大写字母开头</div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即认证</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</fieldset>
