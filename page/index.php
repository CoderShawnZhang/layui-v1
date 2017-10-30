

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>layout 后台大布局 - Layui</title>
    <link rel="stylesheet" href="../layui/css/layui.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>

    </style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">layui 后台布局</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left" lay-filter="top-menu">
            <li class="layui-nav-item" data-left="left-menu0"><a href="javascript:;">控制台</a></li>
            <li class="layui-nav-item" data-left="left-menu1"><a href="javascript:;">商品管理</a></li>
            <li class="layui-nav-item" data-left="left-menu2"><a href="javascript:;">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd data-left="left-menu3"><a href="javascript:;">邮件管理</a></dd>
                    <dd data-left="left-menu4"><a href="javascript:;">消息管理</a></dd>
                    <dd data-left="left-menu6"><a href="javascript:;">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    贤心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="javascript:;">退了</a></li>
            <li class="layui-nav-item"><a href="javascript:;">最新活动</a></li>
            <li class="layui-nav-item layui-this">
                <a href="javascript:;">产品</a>
                <dl class="layui-nav-child">
                    <dd><a href="">选项1</a></dd>
                    <dd><a href="">选项2</a></dd>
                    <dd><a href="">选项3</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">大数据</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">解决方案</a>
                <dl class="layui-nav-child">
                    <dd><a href="">移动模块</a></dd>
                    <dd><a href="">后台模版</a></dd>
                    <dd class="layui-this"><a href="">选中项</a></dd>
                    <dd><a href="">电商平台</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">社区</a></li>
        </ul>

    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree left-menu0"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">所有商品</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">列表一</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="javascript:;">列表三</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">解决方案</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">列表一</a></dd>
                        <dd><a href="javascript:;">列表二</a></dd>
                        <dd><a href="">超链接</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="javascript:;">云市场</a></li>
                <li class="layui-nav-item"><a href="javascript:;">发布商品</a></li>
            </ul>
            <ul class="layui-nav layui-nav-tree left-menu1" lay-filter="test">
                <li class="layui-nav-item">
                    <a href="javascript:;">后台用户2</a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="javascript:;" data-url="https://www.layui.com/doc/" data-id="3">登录日志</a>
                        </dd>
                        <dd>
                            <a href="javascript:;" data-url="https://www.layui.com/doc/" data-id="4">操作日志</a>
                        </dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav layui-nav-tree left-menu2" lay-filter="test">
                <li class="layui-nav-item">
                    <a href="javascript:;">后台用户3</a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="javascript:;" data-url="https://www.layui.com/doc/" data-id="3">登录日志</a>
                        </dd>
                        <dd>
                            <a href="javascript:;" data-url="https://www.layui.com/doc/" data-id="4">操作日志</a>
                        </dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav layui-nav-tree left-menu3" lay-filter="test">
                <li class="layui-nav-item">
                    <a href="javascript:;">后台用户4</a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="javascript:;" data-url="https://www.layui.com/doc/" data-id="3">登录日志</a>
                        </dd>
                        <dd>
                            <a href="javascript:;" data-url="https://www.layui.com/doc/" data-id="4">操作日志</a>
                        </dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav layui-nav-tree left-menu4" lay-filter="test">
                <li class="layui-nav-item">
                    <a href="javascript:;">后台用户6444</a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="javascript:;" data-url="https://www.layui.com/doc/" data-id="3">登录日志</a>
                        </dd>
                        <dd>
                            <a href="javascript:;" data-url="https://www.layui.com/doc/" data-id="4">操作日志</a>
                        </dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav layui-nav-tree left-menu6" lay-filter="test">
                <li class="layui-nav-item">
                    <a href="javascript:;">后台用户666</a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="javascript:;" data-url="https://www.layui.com/doc/" data-id="3">登录日志</a>
                        </dd>
                        <dd>
                            <a href="javascript:;" data-url="https://www.layui.com/doc/" data-id="4">操作日志</a>
                        </dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

    <div class="layui-body iframe-body-top">
        <!-- 内容主体区域 -->
        <div class="layui-tab iframe-content-top" lay-filter="demo" lay-allowclose="true">
            <ul class="layui-tab-title">
                <li class="layui-this" lay-id="11">网站设置</li>
                <li lay-id="22">用户管理</li>
                <li lay-id="33">权限分配</li>
                <li lay-id="44">商品管理</li>
                <li lay-id="55">订单管理</li>
            </ul>
            <!--
            <ul class="layui-nav closeBox">
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="iconfont icon-caozuo"></i> 页面操作</a>
                    <dl class="layui-nav-child" >
                        <dd><a href="javascript:;" class="refresh refreshThis"><i class="layui-icon">&#x1002;</i> 刷新当前</a></dd>
                        <dd><a href="javascript:;" class="closePageOther"><i class="iconfont icon-prohibit"></i> 关闭其他</a></dd>
                        <dd><a href="javascript:;" class="closePageAll"><i class="iconfont icon-guanbi"></i> 关闭全部</a></dd>
                    </dl>
                </li>
            </ul>
            -->
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-tab-content clildFrame" style="padding: 0;">
                        <div class="layui-tab-item layui-show" lay-filter="bodyTab">
                            <iframe src="main.php"></iframe>
                        </div>
                    </div>
                </div>
                <div class="layui-tab-item">内容2</div>
                <div class="layui-tab-item">内容3</div>
                <div class="layui-tab-item">内容4</div>
                <div class="layui-tab-item">内容5</div>
            </div>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>
<script src="../layui/layui.js"></script>
<script src="../assets/js/nav.js"></script>


</body>
</html>
