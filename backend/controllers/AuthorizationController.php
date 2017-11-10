<?php
/**
 *  授权
 */

namespace backend\controllers;


use backend\models\AuthItem;
use backend\models\AuthItemChild;
use yii\filters\AccessControl;
use Yii;
class AuthorizationController extends BaseController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login','logout','signup','special-callback'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login','signup'],
                        'roles' => ['?'],//？访客用户
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],//@已认证用户
                    ],
                    [
                        'allow' => true,
                        'actions' => ['special-callback'],
                        'matchCallback' => function ($rule, $action) {
//            var_dump(date('d-m'));die;
                            return date('d-m') === '02-11';
                        }
                    ],
                ],
                'denyCallback' => function($rule, $action) {
                    throw new \Exception('只能在11月2号才可以访问！');
                }
            ],
        ];
    }
    public function actionSpecialCallback(){
        return $this->render('access');
    }
    public function actionRbac(){
        return $this->render('rbac');
    }

    /**
     * 获取角色列表
     */
    public function actionRoleList(){
        $condition = ['type'=>['='=>AuthItem::TYPE_ROLE]];
        $Role = AuthItem::search($condition);
        $tableData = [];
        //TODO 重构，将foreach封装
        foreach($Role as $val){
            $tableData[] = ['role'=>$val['name']];
        }
        return $this->tableDataHeader($tableData);
    }

    /**
     * 获取权限列表
     * @return string
     */
    public function actionPermissionList(){
        $condition = ['type'=>['='=>AuthItem::TYPE_PERMISSION]];
        $PermissionList = AuthItem::search($condition);
        //TODO 重构，将foreach封装
        $tableData = [];
        foreach($PermissionList as $val){
            $tableData[] = ['permission'=>$val['name']];
        }
        return $this->tableDataHeader($tableData);
    }

    /**
     * 获取角色拥有的权限列表
     */
    public function actionRolePermissionList(){

        $RolePermissionList = AuthItemChild::search();
        $tableData = [];
        foreach($RolePermissionList as $val){
            $tableData[] = ['role'=>$val['parent'],'permission'=>$val['child']];
        }

        return $this->tableDataHeader($tableData);
    }


    //==================================================================================================================
    /**
     * 创建权限
     * @return string
     */
    public function actionCreatePermission()
    {
        //auth_item:type=1是角色，type=2为权限
        $name = Yii::$app->request->post('name');
        $auth = Yii::$app->authManager;
        $createPost = $auth->createPermission($name);
        $createPost->description = '创建了 ' . $name. ' 权限';
        $auth->add($createPost);
        return $this->render('rbac',['tabIndex'=>2]);
    }

    /**
     * 删除权限
     */
    public function actionRemovePermission(){

    }
    /**
     * 创建角色
     * @return string
     */
    public function actionCreateRole()
    {
        //auth_item:type=1是角色，type=2为权限
        $name = Yii::$app->request->post('name');
        $auth = Yii::$app->authManager;
        $role = $auth->createRole($name);
        $role->description = '创建了 ' . $name. ' 角色';
        $auth->add($role);
        return $this->render('rbac');
    }

    /**
     * 将权限赋给角色
     * @return string
     */
    public function actionAddChild()
    {
        //auth_item_child 角色与权限关心对应表
        $auth = Yii::$app->authManager;
        $parent = $auth->createRole('店长');                //创建角色对象
        $child = $auth->createPermission('check-permission');            //创建权限对象
        $auth->addChild($parent, $child);                           //添加对应关系
        return $this->render('rbac');
    }

    /**
     * 将角色赋给用户
     * @return string
     */
    public function actionAddAssign()
    {
        $auth = Yii::$app->authManager;
        $role = $auth->createRole('admin');                //创建角色对象
        $user_id = 1;                                             //获取用户id，此处假设用户id=1
        $auth->assign($role, $user_id);                           //添加对应关系
        return $this->render('rbac');
    }

    /**
     * 验证权限
     * @param \yii\base\Action $action
     *
     * @return bool
     * @throws \yii\web\UnauthorizedHttpException
     */
    public function actionCheckPermission()
    {
//        $action = Yii::$app->request->post('action');

        $action = Yii::$app->controller->action->id;
        if(Yii::$app->user->can($action)){
            return true;
        }else{
            throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
        }
    }
}