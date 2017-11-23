<?php
/**
 * 接受用户数据
 */

namespace backend\controllers;


use app\models\Image;
use app\models\Setting;
use backend\models\GetingData\LoginForm;
use backend\models\GetingData\UploadForm;
use backend\models\GetingData\UploadsForm;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class GetingdataController extends BaseController
{
    public $enableCsrfValidation = false;

    public function actionFresh(){
        return $this->actionIndex();
    }
    public function actionIndex(){
        $LoginForm = new LoginForm();
        return $this->render('index',['model'=>$LoginForm]);
    }

    public function actionPostform(){
        $post = \Yii::$app->request->post();
        unset($post['_csrf']);
        $loginform = new LoginForm();

//        $reflector = new \ReflectionClass($loginform);
//        $formArr = $reflector->getShortName();
//        $arr[$formArr] = [];
//        foreach ($post as $k=>$v){
//            if($k=='_csrf'){
//                continue;
//            }
//            $arr[$formArr][$k] = $v;
//        }
        //注意，如果自己重组了模型生成表单的name值，load的时候是有问题的，因为它会以数组方式数组是以模型名定义的。然后load这个模型数组
        if(!$loginform->load($post))
        {
            var_dump('load数据失败！');die;
        }

        if(!$loginform->validate()){
            var_dump($loginform->getErrors());
        }
        var_dump('ok');die;
    }

    /**
     * 渲染上传页面
     * @return string
     */
    public function actionUploadIndex(){
        $model = new UploadForm();
        $models = new UploadsForm();
        return $this->render('UploadIndex',['model'=>$model,'models'=>$models]);
    }
    public function actionImageList(){
        $imageList = UploadForm::find()->where(['status'=>Image::IMAGE_STATUS_YES])->asArray()->all();
        foreach($imageList as $key=>$val){
            $imageList[$key]['src'] = '<img src='.$val['src'].' style="width:100px;height:100px;"/>';
        }
        return $this->tableDataHeader($imageList);
    }
    /**
     * 上传到服务器(上传单张)
     * layui框架，上传多张是通过多次请求单张实现的多图片上传
     */
    public function actionUpload(){
        $model = new UploadForm();
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // 文件上传成功
                $res = ['code'=>0];
                $this->saveImageToDb($model);
            }else{
                $res = ['code'=>1];
            }
            return json_encode($res);
        }
    }

    /**
     * YII2上传多图片，整合layui前端样式
     */
    public function actionUploads(){
        $model = new UploadsForm();
        if(Yii::$app->request->isPost){
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->uploads()) {
                // 文件上传成功
                $res = '上传成功！';
                $this->saveImageToDb($model);
                return $res;
            }else{
                return '上传失败！';
            }
        }
    }

    private function saveImageToDb($model){
        $name = $model->imageFile->name;
        $size = $model->imageFile->size;
        $image = new Image();
        $image->name = $name;
        $image->size = $size;
        $image->src = Yii::$app->params['uploadPath'].$name;
        $image->status = 0;
        $image->save(false);
    }

    /**
     * 收集列表输入（配置）
     */
    public function actionSetting(){
        $model = new Setting();
        $setting = Setting::find()->asArray()->all();
        return $this->render('setting',['setting'=>$setting,'model'=>$model]);
    }

    /**
     * 多模型更新设置
     *
     * @return string
     */
    public function actionSettingUpdate(){
        $setting = Setting::find()->indexBy('name')->all();
        if (Model::loadMultiple($setting,Yii::$app->request->post()) && Model::validateMultiple($setting)) {
            foreach($setting as $set){
                $set->save(false);
            }
        }
        return $this->render('setting', ['model' => $setting]);
    }
    /**
     * 新增配置
     */
    public function actionAdd(){
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            $set = new Setting();
            $set->name = isset($post['name'])?$post['name']:'';
            $set->value = isset($post['value'])?$post['value']:'';
            $set->title = isset($post['title'])?$post['title']:'';

            if(!$set->save()){

            }
            $setting = Setting::find()->indexBy('name')->all();
            return $this->render('setting',['model' => $setting]);
        }
        return $this->render('add');
    }

    public function actionTime()
    {
        return date("h:i:s");
    }
}