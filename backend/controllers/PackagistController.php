<?php
/**
 * 依赖包管理
 */

namespace backend\controllers;


class PackagistController extends BaseController
{
    public function actionIndex(){

        return $this->render('index');
    }

    public function actionCreate(){
        return $this->render('create');
    }

    public function actionPackList(){
        $ignoe = ['.','..'];
        $list = scandir("../YiiFramework2/Widgets");
        $datat = [];
        foreach($list as $key => $val){
            $arr = [];
            if(!in_array($val,$ignoe) && is_dir("../YiiFramework2/Widgets/".$val)){
                $filename = "../YiiFramework2/Widgets/".$val."/README.lay";
                if(file_exists($filename)) {
                    $contents = file_get_contents($filename);
                    $arr = explode(',',$contents);
                }
                $datat[] = ['file'=>$val,'tt'=>isset($arr[0]) ? $arr[0] : ''];
            }
        }

        return $this->tableDataHeader($datat);
    }
    public function actionInclude(){
        return $this->render('include');
    }

    public function actionMathGitHub(){
        return $this->render('mathgithub');
    }
}