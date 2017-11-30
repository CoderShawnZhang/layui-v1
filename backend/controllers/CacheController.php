<?php
/**
 * Yii2.0--缓存
 * User: anlewo0208
 * Date: 2017/11/6
 * Time: 下午5:52
 */

namespace backend\controllers;

use backend\YiiFramework2\File\file;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Yii;
class CacheController extends BaseController
{
    protected $key = 'test';
    protected $file;
    protected $cache;
    public function init()
    {
        parent::init();
        $this->file = new file();
        $this->cache = Yii::$app->cache;
        //判断redis是否开启
        $redis = new \Redis();
        $redis->connect('192.168.200.101', 6379);
        $redis->auth('anlewo2016')  or die("redis 服务器连接失败");;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionFiledepend(){
        $cacheKey = 'cacheFile';
        $dependency = new \yii\caching\FileDependency(['fileName'=>'../YiiFramework2/Cache/FileDepend/content.txt']);
        $this->cache->add($cacheKey,'初始缓存值：Hello World!',60,$dependency);

        if(Yii::$app->request->isAjax) {
            $get = Yii::$app->request->get();
            $flush = isset($get['flush'])?$get['flush']:0;
            $change = isset($get['changeTxt'])?$get['changeTxt']:0;
            $setcache = isset($get['setcache'])?$get['setcache']:0;
            $getcache = isset($get['getcache'])?$get['getcache']:0;

            if ($change) {

                file_put_contents('../YiiFramework2/Cache/FileDepend/content.txt', time());
            }
            if ($flush) {
                $this->cache->flush();
            }
            if($setcache){
                $this->cache->set($cacheKey,'手动赋值缓存值：Hello World!');
            }
            return $this->renderAjax('cachekey',['cacheKey'=>$this->cache->get($cacheKey)]);
        }

        $cacheFile = $this->cache->get($cacheKey);
        return $this->render('filedepend',['cacheFile'=>$cacheFile]);
    }

    /**
     * 片段缓存
     */
    public function actionFlagCache(){
        return $this->renderAjax('cachekey',['cacheKey'=>$this->cache->get()]);
    }

    public function actionCacheDepend(){
        $data = ['code'=>0,'msg'=>'','count'=>3,'data'=>[
            ['id'=>1,'event'=>rand(1,9999),'key'=>'cacheFile','value'=>$this->cache->get('cacheFile'),'depend'=>'文件依赖'],
            ['id'=>2,'event'=>rand(1,9999),'key'=>'cacheExpression','value'=>$this->cache->get('cacheFile'),'depend'=>'表达式依赖'],
            ['id'=>3,'event'=>rand(1,9999),'key'=>'cacheFile','value'=>$this->cache->get('cacheFile'),'depend'=>'db依赖']
        ]];
        return json_encode($data);
    }
    /**
     * 写入键值缓存
     */
    public function actionWriteredis()
    {
        $error = [];
        $post  = Yii::$app->request->post();
        Yii::$app->redis->set($this->key, $post['redistxt']);
        return $this->render('index', ['error' => $error]);
    }

    /**
     * 读取键值缓存
     */
    public function actionReadredis()
    {
        return $this->render('index', ['keys' => Yii::$app->redis->get($this->key)]);
    }

    /**
     * 删除键值缓存
     */
    public function actionDelredis()
    {
        Yii::$app->redis->del($this->key);

        return $this->render('index', ['keys' => Yii::$app->redis->get($this->key)]);
    }

    /**
     * 查看所有的键
     */
    public function actionShowredis(){

        $data = [];
        $page = Yii::$app->request->get();
        $cur_page = isset($page['page'])?$page['page']:1;

        $RedisList = Yii::$app->redis->keys('*');
        $list = array_chunk($RedisList,8,$cur_page);
        $i = 0;
        foreach ($list[$cur_page-1] as $key => $val){

            try {
                if(Yii::$app->redis->hlen($val) > 0){

                }
                if ( ! Yii::$app->redis->exists($val)) {
                    $str = uniqid(mt_rand(), 1);
                    Yii::$app->redis->set($val, sha1($str));
                }

                $i++;
                $t          = Yii::$app->redis->get($val);
                $redisValue = isset($t) ? $t : '';
                $data[]     = ['id' => $key, 'redisKey' => $val, 'redisValue' => $redisValue];
            }catch (\Exception $e){
                var_dump($e->getMessage());
            }
        }


        $data = ['code'=>0,'msg'=>'','count'=>count($RedisList),'data'=>$data];
        return json_encode($data);
    }


    /**
     *
     * 文件缓存
     *
     * @return string
     */
    public function actionFileCache(){
        return $this->render('FileCache');
    }
    public function actionCreateFileCache(){
        //        $this->cache->keyPrefix = 'layui_';
        //        $this->cache->getOrSet(rand(1,999),function(){ return '缓存热搜排行榜'.rand(1,999);});
        $this->cache->set(rand(1,999),'缓存热搜排行榜'.rand(1,999),20);
        return $this->redirect('file-cache');
    }

    public function actionEditFileCache(){

        //改变文件的修改时间（获取缓存的时候回对比修改时间，如果缓存过期了，可以通过touch延续缓存生命）
//
        $key = Yii::$app->request->get('key');
        $keystr = $this->file->substrByMark($this->file->substrByMark($key,'_'),'.',-1);
        return $this->render('editfilecache',['keystr'=>$keystr]);
    }

    /**
     * 缓存延续生命
     */
    public function actionCacheTouch(){
        $time = Yii::$app->request->get('time',20);
        $cacheKey = Yii::$app->request->get('key');
        $filePath = '../runtime/cache/la/'.$cacheKey;
        touch($filePath,time()+$time);
        return true;
    }
    /**
     *
     * 获取文件缓存
     *
     * @return string
     */
    public function actionGetFileCacheFile(){
        //开始运行
        $data = [];
        $arr_file = array();
        $this->file->tree($arr_file, "../runtime/cache");
        $page = Yii::$app->request->get('page',1);
        $limit = Yii::$app->request->get('limit',10);
        $pageCount = $limit * $page;

        foreach($arr_file as $key => $val){
            if(!strpos($val,'.bin')){
                continue;
            }
            if($key >= $limit * ($page-1) && $key+1 <= $pageCount){
               $cacheFile = $this->file->substrByMark($val,'/');
               $fileUpdate = $this->file->updateTime('../runtime/cache/'.$val);
               $data[] = [
                   'filecache'=>$cacheFile,
                   'fileupdate' => $fileUpdate,
                   'cachetime' => ($fileUpdate - time())<=0 ? '过期':$fileUpdate - time()
               ];
            }
        }
        $data = ['code'=>0,'msg'=>'','count'=>count($arr_file),'data'=>$data];
        return json_encode($data);
    }
}