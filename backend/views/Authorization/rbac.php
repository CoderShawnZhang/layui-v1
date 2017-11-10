<style>
    .layui-tab-card>.layui-tab-title .layui-this{background: #5d6982;}

    .layui-text a{color: white;}
</style>

<div class="layui-tab layui-tab-card" lay-filter="rbacTab">
    <ul class="layui-tab-title">
        <li class="layui-this" lay-id="1">配置RBAC</li>
        <li lay-id="2">创建权限</li>
        <li lay-id="3">创建角色</li>
        <li lay-id="4">将权限赋给角色</li>
        <li lay-id="5">将角色赋给用户</li>
        <li lay-id="6">验证权限</li>
    </ul>
    <div class="layui-tab-content" style="height:auto;">
        <div class="layui-tab-item layui-show">
            <div class="layui-elem-quote" style="margin-top: 20px;">
                <p>1，在common/config/main-local.php添加如下代码</p>
            </div>
<pre class="layui-code" lay-title="配置RBAC" lay-skin="notepad">
'authManager' => [
    'class' => 'yii\rbac\DbManager',
    'itemTable' => 'auth_item',
    'assignmentTable' => 'auth_assignment',
    'itemChildTable' => 'auth_item_child',
],
</pre>
<div class="layui-elem-quote" style="margin-top: 20px;">
      <p>2，执行：php yii migrate --migrationPath=@yii/rbac/migrations/</p>
      <p>成功后生成4张表：auth_assignment，auth_item，auth_item_child，auth_rule</p>
</div>
        </div>
        <div class="layui-tab-item">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>创建权限</legend>
            </fieldset>
            <ul class="layui-timeline">
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">1、创建权限；</h3>
                        <table class="layui-table" lay-data="{height:'full-300', url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/authorization/permission-list') ;?>', page:true, id:'test'}" lay-filter="test">
                            <thead>
                            <tr>
                                <th lay-data="{field:'permission', width:150}">权限名称</th>
                                <th lay-data="{fixed: 'right', toolbar: '#barOption', width:200, align:'center'}">操作</th>
                            </tr>
                            </thead>
                        </table>
                        <div class="layui-hide" id="barOption">
                            <a class="layui-btn layui-btn-mini" data-type="t" lay-event="edit">授权</a>
                            <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
                            <a class="layui-btn layui-btn-small layui-btn-mini" lay-event="detail">查看用户</a>
                        </div>
                        <form action="/authorization/create-permission" method="post">
                            <label class="layui-form-label">权限名称</label>
                            <div class="layui-inline">
                                <input type="hidden" name="tab" value="1"/>
                                <input type="text" name="name" required lay-verify="required" placeholder="createPost" autocomplete="off" class="layui-input">
                            </div>
                            <button class="layui-btn">1、创建权限</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div><!--创建权限-->
        <div class="layui-tab-item">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>创建角色</legend>
            </fieldset>
            <ul class="layui-timeline">
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">2、创建角色</h3>
                        <table class="layui-table" lay-data="{height:'full-300', url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/authorization/role-list') ;?>', page:true, id:'test'}" lay-filter="test">
                            <thead>
                            <tr>
                                <th lay-data="{field:'role', width:150}">角色名称</th>
                                <th lay-data="{fixed: 'right', toolbar: '#barOption', width:200, align:'center'}">操作</th>
                            </tr>
                            </thead>
                        </table>
                        <div class="layui-hide" id="barOption">
                            <a class="layui-btn layui-btn-mini" data-type="t" lay-event="edit">授权</a>
                            <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
                            <a class="layui-btn layui-btn-small layui-btn-mini" lay-event="detail">查看用户</a>
                        </div>
                        <form action="/authorization/create-role" method="post">
                            <label class="layui-form-label">角色名称</label>
                            <div class="layui-inline">
                                <input type="text" name="name" required lay-verify="required" placeholder="admin" autocomplete="off" class="layui-input">
                            </div>
                            <button class="layui-btn layui-btn-normal">2、创建角色</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div><!--创建角色-->
        <div class="layui-tab-item">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>将权限赋给角色</legend>
            </fieldset>
            <ul class="layui-timeline">
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">3、将权限赋给角色</h3>
                        <table class="layui-table" lay-data="{height:'full-300', url:'<?php echo Yii::$app->urlManager->createAbsoluteUrl('/authorization/role-permission-list') ;?>', page:true, id:'test'}" lay-filter="test">
                            <thead>
                            <tr>
                                <th lay-data="{field:'role', width:150}">角色名称</th>
                                <th lay-data="{field:'permission', width:150}">拥有的权限</th>
                                <th lay-data="{fixed: 'right', toolbar: '#barOption', width:200, align:'center'}">操作</th>
                            </tr>
                            </thead>
                        </table>
                        <div class="layui-hide" id="barOption">
                            <a class="layui-btn layui-btn-mini" data-type="t" lay-event="edit">授权</a>
                            <a class="layui-btn layui-btn-danger layui-btn-mini" lay-event="del">删除</a>
                            <a class="layui-btn layui-btn-small layui-btn-mini" lay-event="detail">查看用户</a>
                        </div>
                        <form action="/authorization/add-child" method="post">
                            <button class="layui-btn">将权限赋给角色</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div><!--将权限赋给角色-->
        <div class="layui-tab-item">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>将角色赋给用户</legend>
            </fieldset>
            <ul class="layui-timeline">
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">4、将角色赋给用户</h3>
                        <form action="/authorization/add-assign" method="post">
                            <button class="layui-btn">4、将角色赋给用户</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div><!--将角色赋给用户-->
        <div class="layui-tab-item">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>验证权限</legend>
            </fieldset>
            <ul class="layui-timeline">
                <li class="layui-timeline-item">
                    <i class="layui-icon layui-timeline-axis"></i>
                    <div class="layui-timeline-content layui-text">
                        <h3 class="layui-timeline-title">5、验证权限</h3>
                        <form action="/authorization/check-permission" method="post">
                            <label class="layui-form-label">查看权限</label>
                            <div class="layui-inline">
                                <input type="text" name="action" required lay-verify="required" placeholder="admin" autocomplete="off" class="layui-input">
                            </div>
                            <button class="layui-btn">5、验证权限</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div><!--验证权限-->
    </div>
</div>

<script>
    layui.use(['code','table','element'], function(){
        layui.code();  //实际使用时，执行该方法即可。而此处注释是因为修饰器在别的js中已经执行过了
        var table = layui.table,
        element = layui.element;
        element.tabChange('rbacTab','<?php echo $tabIndex;?>'); //切换到当前选项卡
    });
</script>
