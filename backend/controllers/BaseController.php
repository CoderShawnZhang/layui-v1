<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/11/2
 * Time: 上午11:37
 */

namespace backend\controllers;

use yii\base\Controller;

class BaseController extends Controller
{
    public function view($view,$data=[]){
        $this->render($view,$data);
    }

    /**
     * 返回layui框架table需要的数据结构
     * @param $tableData
     *
     * @return string
     */
    public function tableDataHeader($tableData){
        $data = ['code'=>0,'msg'=>'','count'=>100,'data'=>$tableData];
        return json_encode($data);
    }
}