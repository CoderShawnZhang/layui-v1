<style>
    .panel{
        float: left;
        text-align: center;
        width: 16.666%;
        min-width: 210px;
        margin-bottom: 10px;
        height:100px;
    }
</style>
<div class="row">
    <div class="sysNotice col">
        <blockquote class="layui-elem-quote title">Yii 是什么</blockquote>
        <div class="layui-elem-quote layui-quote-nm">
            <h3># v1.0.1（优化） - 2017-06-25</h3>
            <p>* 修改刚进入页面无任何操作时按回车键提示“请输入解锁密码！”</p>
            <p>* 优化关闭弹窗按钮的提示信息位置问题【可能是因为加载速度的原因，造成这个问题，所以将提示信息做了一个延时】</p>
            <p>* “个人资料”提供修改功能</p>
            <p>* 顶部天气信息自动判断位置【忘记之前是怎么想的做成北京的了，可能是我在大首都吧，哈哈。。。】</p>
            <p>* 优化“用户列表”无法查询到新添加的用户【竟然是因为我把key值写错了，该死。。。】</p>
            <p>* 将左侧菜单做成json方式调用，而不是js调用，方便开发使用。同时添加了参数配置和非窗口模式打开的判断，【如登录页面】</p>
            <p>* 优化部分页面样式问题</p>
            <p>* 优化添加窗时如果导航不存在图标无法添加成功</p>
            <br />
            <p># v1.0.1（新增） - 2017-07-05</p>
            <p>* 增加“用户列表”批量删除功能【可能当时忘记添加了吧。。。】</p>
            <p style="color:#f00;">* 顶部窗口导航添加“关闭其他”、“关闭全部”功能，同时修改菜单窗口过多的展示效果【在此感谢larryCMS给予的启发】</p>
            <p>* 添加可隐藏左侧菜单功能【之前考虑没必要添加，但是很多朋友要求加上，那就加上吧，嘿嘿。。。】</p>
            <p>* 增加换肤功能【之前就想添加的，但是一直没有找到好的方式（好吧，其实是我忘记了），此方法相对简单，不是普遍适用，只简单的做个功能，如果实际用到建议单独写一套样式，将边框颜色、按钮颜色等统一调整，此处为保证代码的简洁性，只做简单的功能，不做赘述，另外“自定义”颜色中未做校验，所以要写入正确的色值。如“#f00”】</p>
            <p style="color:#f00;">* 增加登录页面【背景视频仅作样式参考，实际使用中请自行更换为其他视频或图片，否则造成的任何问题使用者本人承担。】</p>
            <p>* 新增打开窗口的动画效果</p>
        </div>
    </div>
    <div class="sysNotice col">
        <blockquote class="layui-elem-quote title">系统基本参数</blockquote>
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col>
            </colgroup>
            <tbody>
            <tr>
                <td>当前版本</td>
                <td class="version"></td>
            </tr>
            <tr>
                <td>开发作者</td>
                <td class="author"></td>
            </tr>
            <tr>
                <td>网站首页</td>
                <td class="homePage"></td>
            </tr>
            <tr>
                <td>服务器环境</td>
                <td class="server"></td>
            </tr>
            <tr>
                <td>数据库版本</td>
                <td class="dataBase"></td>
            </tr>
            <tr>
                <td>最大上传限制</td>
                <td class="maxUpload"></td>
            </tr>
            <tr>
                <td>当前用户权限</td>
                <td class="userRights"></td>
            </tr>
            </tbody>
        </table>
        <blockquote class="layui-elem-quote title">最新文章<i class="iconfont icon-new1"></i></blockquote>
        <table class="layui-table" lay-skin="line">
            <colgroup>
                <col>
                <col width="110">
            </colgroup>
            <tbody class="hot_news"></tbody>
        </table>
    </div>
</div>